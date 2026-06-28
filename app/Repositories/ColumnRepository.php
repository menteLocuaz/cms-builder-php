<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Repositories;

class ColumnRepository extends Repository
{
    public function create(array $data): int
    {
        $stmt = $this->db->prepare('INSERT INTO columns (
                id_module_column,
                title_column,
                alias_column,
                type_column,
                matrix_column,
                visible_column,
                date_created_column
            ) VALUES (
                :id_module,
                :title,
                :alias,
                :type,
                :matrix,
                :visible,
                :date_created
            )');

        $stmt->execute([
            ':id_module' => $data['id_module_column'],
            ':title' => $data['title_column'],
            ':alias' => $data['alias_column'],
            ':type' => $data['type_column'],
            ':matrix' => $data['matrix_column'],
            ':visible' => $data['visible_column'],
            ':date_created' => $data['date_created_column'],
        ]);

        return (int) $this->db->lastInsertId();
    }
}
