<?php

namespace CourrierBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use CourrierBundle\Entity\Client;
use UserBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
