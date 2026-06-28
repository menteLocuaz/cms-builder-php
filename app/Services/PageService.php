<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Services;

use Arancamon\CmsBuilderPhp\Repositories\PageRepository;

class PageService
{
    public function __construct(
        private PageRepository $repository
    ) {}

    public function create(array $data): int
    {
        return $this->repository->create($data);
    }
}
