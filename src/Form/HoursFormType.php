<?php

namespace App\Form;

use App\Entity\Hour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoursFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day',TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Jours'])
            ->add('hourtime',TextType::class, ['attr' => [ 'class' => 'form-control'], 'label' => 'Horaires']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hour::class,
        ]);
    }
}
