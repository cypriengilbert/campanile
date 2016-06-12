<?php

namespace CourrierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CourrierBundle\Entity\Courrier;
use CourrierBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class AccueilController extends Controller
{
    /**
     * @Route("/", name="accueil")
     * @Method({"GET", "POST"})
     */
    public function indexAction()
    {
        $repository    = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Courrier');
        $listeCourrier = $repository->findAll();
        $repository    = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Message');
        $listeMessage  = $repository->findAll();
        return $this->render('CourrierBundle:Default:index.html.twig', array(
            'ListeCourrier' => $listeCourrier,
            'ListeMessage' => $listeMessage
        ));
    }

    /**
     * @Route("/allcourrier", name="allcourrier")
     * @Method({"GET", "POST"})
     */
    public function allCourrierAction()
    {
        $repository    = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Courrier');
        $listeCourrier = $repository->findAll();
        return $this->render('CourrierBundle:Default:viewAllCourrier.html.twig', array(
            'ListeCourrier' => $listeCourrier
        ));
    }

    /**
     * @Route("/allmessage", name="allmessage")
     * @Method({"GET", "POST"})
     */
    public function allMessageAction()
    {
        $repository   = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Message');
        $listeMessage = $repository->findAll();
        return $this->render('CourrierBundle:Default:viewAllMessage.html.twig', array(
            'ListeMessage' => $listeMessage
        ));
    }



    /**
     * @Route("/courrier/{id}", name="courrier_view", defaults={"id" = 1})
     * @Method({"GET", "POST"})
     */
    public function CourrierAction($id)
    {
        $repository    = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Courrier');
        $listeCourrier = $repository->find($id);
        return $this->render('CourrierBundle:Default:viewCourrier.html.twig', array(
            'ListeCourrier' => $listeCourrier
        ));

    }


    /**
     * @Route("/message/{id}", name="message_view", defaults={"id" = 1})
     * @Method({"GET", "POST"})
     */
    public function MessageAction($id)
    {
        $repository   = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Message');
        $listeMessage = $repository->find($id);
        return $this->render('CourrierBundle:Default:viewMessage.html.twig', array(
            'ListeMessage' => $listeMessage
        ));

    }

    /**
     * @Route("/add", name="add_courrier")
     * @Method({"GET", "POST"})
     */

    public function addCourrierAction(Request $request)
    {
        $datetime    = new \Datetime('now');
        $newcourrier = new Courrier();
        $newcourrier->setInitialDate($datetime);

        $newcourrier->setEtat(1);
        $form = $this->get('form.factory')->create('CourrierBundle\Form\Type\CourrierType', $newcourrier);


        if ($form->handleRequest($request)->isValid()) {
         if ($newcourrier->getDestinatairelocal() != null){
                $newcourrier->setClient(null);
                   $newcourrier->setEtat(0);
                }
            $em = $this->getDoctrine()->getManager();
            $em->persist($newcourrier);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            if ($newcourrier->getDestinatairelocal() != null){

                                        $newDestinataire       = $newcourrier->getDestinatairelocal()->getEmail();
                                        $newDestinatairePrenom = $newcourrier->getDestinatairelocal()->getPrenom();
                                        $newEmplacement = $newcourrier->getPosition();
                                        $newReceptioniste = $newcourrier->getAuteur();
                                        //Envoie mail
                                        $message               = \Swift_Message::newInstance()->setSubject('Nouvelle reception en attente pour vous à la reception')->setFrom('cyprien@cypriengilbert.com')->setTo($newDestinataire)->setBody('Bonjour ' . $newDestinatairePrenom . '<br><br> Une réception a été faite pour vous à la réception par '.$newReceptioniste.' .', 'text/html');
                                        $this->get('mailer')->send($message);

                             }

            return $this->redirect($this->generateUrl('accueil', array(
                'validate' => 'réception'
            )));
        }
        return $this->render('CourrierBundle:Default:AddCourrier.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/add_message", name="add_message")
     * @Method({"GET", "POST"})
     */

    public function addMessageAction(Request $request)
    {
        $datetime   = new \Datetime('now');
        $user       = $this->container->get('security.context')->getToken()->getUser()->getUsername();
        $newmessage = new Message();
        $newmessage->setdateReception($datetime);

        $newmessage->setIsarchived(0);
        $form = $this->get('form.factory')->create('CourrierBundle\Form\Type\MessageType', $newmessage);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newmessage);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            $newId                 = $newmessage->getId();
            $newDestinataire       = $newmessage->getDestinataire()->getEmail();
            $newDestinatairePrenom = $newmessage->getDestinataire()->getPrenom();
            $newDescription        = $newmessage->getDescription();
            $newExpediteur         = $newmessage->getExpediteur();
            $newContact            = $newmessage->getContact();
            //Envoie mail
            $message               = \Swift_Message::newInstance()->setSubject('Nouveau message provenant de la réception')->setFrom('cyprien@cypriengilbert.com')->setTo($newDestinataire)->setBody('Bonjour ' . $newDestinatairePrenom . '<br><br> Un nouveau message a été enregistré pour vous à la réception <br> Voici le message : ' . $newDescription . '<br><br> Vous pouvez recontacter ' . $newExpediteur . ' en le contactant comme ceci : ' . $newContact, 'text/html');
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('accueil', array(
                'validate' => 'message'
            )));
        }
        return $this->render('CourrierBundle:Default:AddMessage.html.twig', array(
            'form' => $form->createView()
        ));
    }




    /**
     * @Route("/end/{id}", name="end_courrier")
     * @Method({"GET", "POST"})
     */

    public function endCourrierAction(Request $request, $id)
    {
        $courrier = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Courrier')->find($id);
        if (null === $courrier) {
            throw new NotFoundHttpException("Le courrier est inexistant");
        }
        $datetime = new \Datetime('now');
        $courrier->setEtat(0);
        $courrier->setFinalDate($datetime);
        $form = $this->get('form.factory')->create('CourrierBundle\Form\Type\EndCourrierType', $courrier);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($courrier);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            $newId = $courrier->getId();
            return $this->redirect($this->generateUrl('courrier_view', array(
                'end_validate' => 'reception'
            )));
        }
        return $this->render('CourrierBundle:Default:EndCourrier.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/modify/{id}", name="modify_courrier")
     * @Method({"GET", "POST"})
     */

    public function ModifyCourrierAction(Request $request, $id)
    {
        $courrier = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Courrier')->find($id);
        if (null === $courrier) {
            throw new NotFoundHttpException("Le courrier est inexistant");
        }
        $courrier->setEtat(1);
        $form = $this->get('form.factory')->create('CourrierBundle\Form\Type\ModifyCourrierType', $courrier);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($courrier);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            $newId = $courrier->getId();
            return $this->redirect($this->generateUrl('courrier_view', array(
                'modify_validate' => 'reception'
            )));
        }
        return $this->render('CourrierBundle:Default:ModifyCourrier.html.twig', array(
            'form' => $form->createView()
        ));
    }



    /**
     * @Route("/archivemessage/{id}", name="end_message")
     * @Method({"GET", "POST"})
     */

    public function endMessageAction(Request $request, $id)
    {
        $message = $this->getDoctrine()->getManager()->getRepository('CourrierBundle:Message')->find($id);
        if (null === $message) {
            throw new NotFoundHttpException("Le message est inexistant");
        }
        $message->setIsarchived(1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
        return $this->redirect($this->generateUrl('accueil', array(
                                                                           'end_validate' => 'message'
                                                                       )));
    }



}
