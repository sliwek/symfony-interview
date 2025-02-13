<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Serializer\Attribute\SerializedName;

final readonly class Point
{
    public function __construct(
        private string $name,
        #[SerializedName('address_details')]
        private Address $address,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
