<?php

namespace CourrierBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomclient')
            ->add('prenomclient')
            ->add('societeclient')
            ->add('arrivee', 'date', array('widget' => 'single_text', 'empty_value' => array('year' => '2016', 'month' => '05', 'day' => '05')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CourrierBundle\Entity\Client'
        ));
    }


     public function getName()
      {
        return 'accueil';
      }
}
