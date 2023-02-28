<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class NewUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
          $builder

            ->add('last_name', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Nom'])
            ->add('first_name', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Prénom'])
            ->add('allergie', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Allergies/ Sinon Mentionnez: Pas dallergies'])
            ->add('phone_number', TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Télephone'])
            ->add('email', EmailType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Email']);
    }

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => User::class,
    ]);
}
}
