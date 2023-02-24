<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hourReservation',TimeType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Heure'])
            ->add('dateReservation',DateType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Date'] )
            ->add('numberPerson', NumberType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Nombre de Personnes'])
            ->add('message',TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Allergies/ Sinon Mentionnez: Pas dallergies'] )
            ->add('user', HiddenType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
