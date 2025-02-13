<?php

declare(strict_types=1);

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class StreetPostCodeDependency extends Constraint
{
    public string $message = 'Jeśli podano ulicę, kod pocztowy jest wymagany.';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
