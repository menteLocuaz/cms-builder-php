<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Services;

use Arancamon\CmsBuilderPhp\Repositories\ModuleRepository;

class ModuleService
{
    public function __construct(
        private ModuleRepository $repository
    ) {}

    public function create(array $data): int
    {
        return $this->repository->create($data);
    }
}
