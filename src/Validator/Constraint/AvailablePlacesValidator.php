<?php

namespace App\Validator\Constraint;

use App\Repository\ReservationRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AvailablePlacesValidator extends ConstraintValidator
{
    private ReservationRepository $reservationRepository;

    function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function getAvailablePlace($dateReservation, $hourReservation)
    {
        return 46 - $this->reservationRepository->findNumberPerson($dateReservation, $hourReservation);
    }

    public function validate($value, Constraint $constraint)
    {
        $availablePlace = $this->getAvailablePlace(date('Y-m-d'), '12:00:00');

        if ($constraint->$availablePlace <= 0) {
            $this->context->buildViolation($constraint->errors)
                ->addViolation();
        }
    }
}
