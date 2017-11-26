<?php

namespace AppBundle\Form;


use AppBundle\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productName')
            ->add('productDescription')
            ->add('productSize')
            ->add('productAmount')
            ->add('miniature')
            ->add('brandsbrand')
            ->add('categoriescategory');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => Products::class,
        ));
    }
}