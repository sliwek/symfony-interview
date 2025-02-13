<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class PaginatedResponse
{
    public function __construct(
        private int $count,
        private int $page,
        private int $totalPages,
        /** @var Point[] */
        private array $items = []
    ) {}

    public function getCount(): int
    {
        return $this->count;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
