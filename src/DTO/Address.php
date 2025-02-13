<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class Address
{
    public function __construct(
        private ?string $city,
        private ?string $street,
        private ?string $postCode,
        private ?string $province,
        private ?string $buildingNumber,
        private ?string $flatNumber
    ) {}

    public function getCity(): string
    {
        return $this->city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    public function getBuildingNumber(): string
    {
        return $this->buildingNumber;
    }

    public function getFlatNumber(): ?string
    {
        return $this->flatNumber;
    }
}
