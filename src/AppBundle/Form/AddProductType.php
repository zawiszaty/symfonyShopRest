<?php

namespace AppBundle\Form;


use AppBundle\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product_name')
            ->add('product_description')
            ->add('product_size')
            ->add('product_amount')
            ->add('miniature',FileType::class)
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