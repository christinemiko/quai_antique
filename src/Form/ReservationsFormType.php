<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Reservation;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
                'attr' => ['class' => 'form-control'],
                'label' => 'Sélectionner une heure',
                'hours' => [12, 13.00, 14.00, 19, 20, 21],
                'minutes' => [00,15, 30, 45],

            ])

            ->add('dateReservation',DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Sélectionner une date',
                'attr' => [
                    'class' => 'flatpickr-date',
                    'data-disable-mobile' => true,
                    'data-default-date' => 'today',
                    'data-alt-input' => true,
                    'data-alt-format' => 'd M Y',
                    'data-date-format' => 'd-m-Y',
                ],
                'format' => 'dd-MM-yyyy',
            ])

            ->add('availablePlaces', NumberType::class, ['mapped' => false , 'label' => 'Places disponibles : '])
            ->add('numberPerson', NumberType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Nombre de Personnes'])
            ->add('message',TextType::class, [ 'attr' => [ 'class' => 'form-control'], 'label' => 'Allergies/ Sinon Mentionnez: Pas dallergies'])
            ->add('user',EntityType::class,[
                'class'=> User:: class,
                'choice_label' => function(User $user) {
                return $user->getLastname() . '_' . $user->getFirstName() . ' / ' . $user->getEmail() . '_' .$user->getPhoneNumber();
                },
                 'query_builder' => function(EntityRepository $entityRepository){
                  return $entityRepository->createQueryBuilder('u')
                      ->orderBy('u.lastName', 'ASC');
                 },
                'label' => 'Clients : ']);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
