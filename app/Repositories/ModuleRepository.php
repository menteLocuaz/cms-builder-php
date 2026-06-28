<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Repositories;

class ModuleRepository extends Repository
{
    public function create(array $data): int
    {
        $stmt = $this->db->prepare('INSERT INTO modules (
                id_page_module,
                type_module,
                title_module,
                suffix_module,
                editable_module,
                date_created_module
            ) VALUES (
                :id_page,
                :type,
                :title,
                :suffix,
                :editable,
                :date_created
            )');

        $stmt->execute([
            ':id_page' => $data['id_page_module'],
            ':type' => $data['type_module'],
            ':title' => $data['title_module'],
            ':suffix' => $data['suffix_module'] ?? null,
            ':editable' => $data['editable_module'] ?? 1,
            ':date_created' => $data['date_created_module'],
        ]);

        return (int) $this->db->lastInsertId();
    }
}
