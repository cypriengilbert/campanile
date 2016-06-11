<?php

namespace CourrierBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModifyCourrierType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('auteur',   'text')
            ->add('genre', ChoiceType::class, array(
                                            'choices' => array('', 'Palette', 'Carton', 'Tube', 'Enveloppe')))
            ->add('description',    'textarea',  array('required'    => false))
            ->add('position',   'text')
            ->add('title', 'text')
            ->add('client', new ClientType())
            ->add('destinatairelocal', EntityType::class, array(
                                           // query choices from this entity
                                           'class' => 'UserBundle:User',

                                           // use the User.username property as the visible option string
                                           'choice_label' => 'prenom',


                                           'required' => false,
                                       ))
    ;
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
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
