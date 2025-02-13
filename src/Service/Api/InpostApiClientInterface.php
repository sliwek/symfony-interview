<?php

declare(strict_types=1);

namespace App\Service\Api;

use App\DTO\PaginatedResponse;

interface InpostApiClientInterface
{
    public function getPoints(string $city): PaginatedResponse;
}
