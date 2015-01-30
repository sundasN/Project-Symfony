<?php

namespace Troiswa\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActeurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text')
            ->add('lastname', 'text')
            ->add('gender', 'choice', array(
                'choices'   => array(
                    '0' => 'Male',
                    '1' => 'Female'),
                'expanded' => true,
                'required' => true,
            ))
            ->add('dateOfBirth', 'date',array(
                'widget' => 'single_text'
            ))
            ->add('biography', 'textarea')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Troiswa\BackBundle\Entity\Acteur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'troiswa_backbundle_acteur';
    }
}
