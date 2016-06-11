<?php

namespace CourrierBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EndCourrierType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('remispar', 'text')
      ->add('remisa', 'text')


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
