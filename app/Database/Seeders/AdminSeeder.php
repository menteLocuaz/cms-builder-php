<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Seeders;

use Arancamon\CmsBuilderPhp\Services\AdminService;

class AdminSeeder
{
    public function __construct(
        private AdminService $adminService
    ) {}

    public function run(array $data, string $today): int
    {
        return $this->adminService->create([
            'email_admin' => trim($data['email_admin']),
            'password_admin' => trim($data['password_admin']),
            'rol_admin' => 'superadmin',
            'permissions_admin' => '{"todo":"on"}',
            'title_admin' => trim($data['title_admin']),
            'symbol_admin' => trim($data['symbol_admin']),
            'font_admin' => $data['font_admin'],
            'color_admin' => $data['color_admin'],
            'back_admin' => $data['back_admin'],
            'date_created_admin' => $today,
        ]);
    }
}
