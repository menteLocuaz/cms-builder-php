<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Repositories;

class AdminRepository extends Repository
{
    public function create(array $data): int
    {
        $stmt = $this->db->prepare('INSERT INTO admins (
                email_admin,
                password_admin,
                rol_admin,
                permissions_admin,
                title_admin,
                symbol_admin,
                font_admin,
                color_admin,
                back_admin,
                date_created_admin
            ) VALUES (
                :email,
                :password,
                :rol,
                :permissions,
                :title,
                :symbol,
                :font,
                :color,
                :back,
                :date_created
            )');

        $stmt->execute([
            ':email' => $data['email_admin'],
            ':password' => password_hash($data['password_admin'], PASSWORD_BCRYPT),
            ':rol' => $data['rol_admin'],
            ':permissions' => $data['permissions_admin'],
            ':title' => $data['title_admin'],
            ':symbol' => substr($data['symbol_admin'], 0, 50),
            ':font' => $data['font_admin'],
            ':color' => $data['color_admin'],
            ':back' => $data['back_admin'],
            ':date_created' => $data['date_created_admin'],
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function existsByEmail(string $email): bool
    {
        $stmt = $this->db->prepare('SELECT 1 FROM admins WHERE email_admin = :email');
        $stmt->execute([':email' => $email]);
        return (bool) $stmt->fetchColumn();
    }
}
