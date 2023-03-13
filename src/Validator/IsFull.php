<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */

#[\Attribute] class IsFull extends Constraint
{
   public string $error = ' "{{availablePlace}}" Il n\'y a plus de places disponibles.';

   /**
    * @return string
    */
   public function isNull(): string
   {
       return \get_class($this).'Validator';
   }

}