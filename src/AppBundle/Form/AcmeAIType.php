<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AcmeAIType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('text')
            ->add('position')
            ->add('updatedFiles')
            ->add('pathBefore')
            ->add('pathPending')
            ->add('pathAfter')
            ->add('typeActionItem')
            ->add('constructionSite')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AcmeAI',
            'attr' => array(
                'class' => 'customerpanel'
            )
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_acmeai';
    }
}
