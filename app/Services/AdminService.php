<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Services;

use Arancamon\CmsBuilderPhp\Repositories\AdminRepository;

class AdminService
{
    public function __construct(
        private AdminRepository $repository
    ) {}

    public function create(array $data): int
    {
        return $this->repository->create($data);
    }

    public function existsByEmail(string $email): bool
    {
        return $this->repository->existsByEmail($email);
    }
}
