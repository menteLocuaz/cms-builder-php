<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Services;

use Arancamon\CmsBuilderPhp\Repositories\ColumnRepository;

class ColumnService
{
    public function __construct(
        private ColumnRepository $repository
    ) {}

    public function create(array $data): int
    {
        return $this->repository->create($data);
    }
}
