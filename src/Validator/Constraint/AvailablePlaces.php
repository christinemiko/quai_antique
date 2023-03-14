<?php


namespace App\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
/**
 * @Annotation
 */
class AvailablePlaces extends Constraint
{
    public $errors = 'Il n\'y a plus de places disponibles.';
    public $availablePlace;
}
