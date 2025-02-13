<?php

declare(strict_types=1);

namespace App\Form\Model;

use App\Validator\StreetPostCodeDependency;
use Symfony\Component\Validator\Constraints as Assert;

#[StreetPostCodeDependency]
class SearchPointsFormModel
{
    #[Assert\Length(min: 3, max: 64)]
    private ?string $street = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 64)]
    private string $city;

    #[Assert\Regex(
        pattern: '/^\d{2}-\d{3}$/',
        message: 'Kod pocztowy musi być w formacie XX-XXX'
    )]
    private ?string $postCode = null;

    private ?string $name = null;

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(?string $postCode): self
    {
        $this->postCode = $postCode;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
