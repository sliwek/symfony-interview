<?php

declare(strict_types=1);

namespace App\Service\Api;

use App\DTO\PaginatedResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class InpostApiClient implements InpostApiClientInterface
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly SerializerInterface $serializer,
        private readonly string $inpostApiUrl
    ) {}

    public function getPoints(string $city): PaginatedResponse
    {
        $url = $this->inpostApiUrl . '/points?city=' . $city;
        $response = $this->httpClient->request(Request::METHOD_GET, $url);

        return $this->serializer->deserialize($response->getContent(), PaginatedResponse::class, 'json');
    }
}
