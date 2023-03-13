<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class IsFullValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     * @return void
     */

    public function validate(mixed $value, Constraint $constraint): void
    {
        if($value > 0){
            return;
        }

        if($value === 0){


            $this->context->buildViolation($constraint->error)
                ->setParameter('{{availablePlace}}',$value)
                ->addViolation();
        }
    }


}