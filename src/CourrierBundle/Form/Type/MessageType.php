<?php

namespace CourrierBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MessageType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('destinataire', EntityType::class, array(
                               // query choices from this entity
                               'class' => 'UserBundle:User',

                               // use the User.username property as the visible option string
                               'choice_label' => 'prenom',
                                'query_builder' => function (EntityRepository $er) {
                                                                      return $er->createQueryBuilder('u')
                                                                       ->where("u.prenom != 'reception'")
                                                                       ->orderBy('u.prenom', 'ASC');
                                                                            },


                               // used to render a select box, check boxes or radios
                               'multiple' => true,
                               // 'expanded' => true,

                           ))


      ->add('description',    'textarea')
      ->add('messager',    'text')
      ->add('sujet',    'text')
      ->add('societe',    'text',  array('required' => false))
      ->add('phone',    'number', array('required' => false))
      ->add('expediteur',   'text')
      ->add('contact', 'text', array('required' => false))


    ;
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'CourrierBundle\Entity\Message'
    ));
  }

  public function getName()
  {
    return 'accueil';
  }
}
