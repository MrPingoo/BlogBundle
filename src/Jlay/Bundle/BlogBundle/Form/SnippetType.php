<?php

namespace Jlay\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SnippetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hidden')
            ->add('deleted')
            ->add('crdate')
            ->add('title')
            ->add('author')
            ->add('path')
            ->add('bodytext')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jlay\Bundle\BlogBundle\Entity\Snippet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jlay_bundle_blogbundle_snippet';
    }
}
