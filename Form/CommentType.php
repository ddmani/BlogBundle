<?php

namespace ddmani\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commentAuthorEmail')
//            ->add('commentAuthorIp')
            ->add('commentAuthorUrl')
//            ->add('commentDateCreate')
//            ->add('commentDateModify')
            ->add('commentContent')
            ->add('commentStatus', 'checkbox', array('required' => false))
//            ->add('commentParentId')
//            ->add('commentUserId')
//            ->add('commentPost')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ddmani\BlogBundle\Entity\Comment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ddmani_blogbundle_comment';
    }
}
