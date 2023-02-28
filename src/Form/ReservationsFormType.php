<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Reservation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hourReservation',TimeType::class, [
                'attr' => [ 'class' => 'form-control'],
                'label' => 'Heure',
                'hours' => [12, 13.00, 14.00, 19, 20, 21]
            ])
            ->add('dateReservation',DateType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Date'])
            ->add('numberPerson', NumberType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Nombre de Personnes'])
            ->add('message',TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Allergies/ Sinon Mentionnez: Pas dallergies'])
            ->add('user',EntityType::class,[
                'class'=> User:: class,
                'choice_label' => function($user) {
                return $user->getlastName() . " " . $user->getfirstname() . "/ Email: " . $user->getEmail() . "/ Tél: " . $user->getphoneNumber();
                },
                'label' => 'Clients']);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
