<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Repositories;

use PDO;

abstract class Repository
{
    public function __construct(
        protected PDO $db
    ) {}
}
