<?php

namespace CourrierBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use CourrierBundle\Entity\Client;
use UserBundle\Entity\User;
use Doctrine\ORM\EntityRepository;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class CourrierType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('auteur',   'text')
      ->add('genre', ChoiceType::class, array(
                                      'choices' => array('', 'Palette' => 'Palette', 'Carton' => 'Carton', 'Tube' => 'Tube', 'Enveloppe' => 'Enveloppe')))
      ->add('description',    'textarea',  array('required'    => false))
      ->add('position',   'text')
      ->add('title', 'text')
      ->add('commentaire',    'textarea',  array('required'    => false))
      ->add('client', new ClientType())
      ->add('destinatairelocal', EntityType::class, array(
                                     // query choices from this entity
                                     'class' => 'UserBundle:User',

                                     // use the User.username property as the visible option string
                                     'choice_label' => 'prenom',
                                      'query_builder' => function (EntityRepository $er) {
                                       return $er->createQueryBuilder('u')
                                        ->where("u.prenom != 'reception'")
                                        ->orderBy('u.prenom', 'ASC');
                                             },


                                     'required' => false,
                                 ))


;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'CourrierBundle\Entity\Courrier'
    ));
  }

  public function getName()
  {
    return 'accueil';
  }
}
