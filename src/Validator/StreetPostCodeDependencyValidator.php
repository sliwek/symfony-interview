<?php

declare(strict_types=1);

namespace App\Validator;

use App\Form\Model\SearchPointsFormModel;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class StreetPostCodeDependencyValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$value instanceof SearchPointsFormModel) {
            throw new UnexpectedTypeException($value, SearchPointsFormModel::class);
        }

        if (!$constraint instanceof StreetPostCodeDependency) {
            throw new UnexpectedTypeException($constraint, StreetPostCodeDependency::class);
        }

        if ($value->getStreet() && !$value->getPostCode()) {
            $this->context->buildViolation($constraint->message)
                ->atPath('postCode')
                ->addViolation();
        }
    }
}
