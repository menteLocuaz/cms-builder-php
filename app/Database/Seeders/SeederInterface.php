<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Seeders;

interface SeederInterface
{
    public function run(mixed ...$args): mixed;
}
