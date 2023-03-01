<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditAdministratorsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Email'])
            ->add('lastName',TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Nom'])
            ->add('firstName', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Prénom'])
            ->add('allergie', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Allergies/ Sinon Mentionnez: Pas dallergies'])
            ->add('phoneNumber',TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Télephone'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
