<?php

namespace AppBundle\Form;


use AppBundle\Entity\DeliveryMethod;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditDeliveryMethod extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('methods')
            ->add('methods_prize');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => DeliveryMethod::class,
            'allow_extra_fields' => true,
        ));
    }
}