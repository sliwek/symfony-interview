<?php

declare(strict_types=1);

use App\DTO\PaginatedResponse;
use App\Service\Api\InpostApiClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class InpostApiClientTest extends TestCase
{
    public function testGetPointsReturnsDeserializedResponse()
    {
        $mockResponse = new MockResponse(json_encode([
            'count' => 1,
            'page' => 1,
            'total_pages' => 1,
            'items' => [
                [
                    'name' => 'Test Point',
                    'address_details' => [
                        'city' => 'Kozy',
                        'street' => 'Test Street',
                        'post_code' => '12-345',
                        'province' => 'Test Province',
                        'building_number' => '1',
                        'flat_number' => null
                    ]
                ]
            ]
        ]));
// ToDo
    }
}
