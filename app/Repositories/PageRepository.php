<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Repositories;

class PageRepository extends Repository
{
    public function create(array $data): int
    {
        $stmt = $this->db->prepare('INSERT INTO pages (
                title_page,
                url_page,
                icon_page,
                type_page,
                order_page,
                date_created_page
            ) VALUES (
                :title,
                :url,
                :icon,
                :type,
                :order,
                :date_created
            )');

        $stmt->execute([
            ':title' => $data['title_page'],
            ':url' => $data['url_page'],
            ':icon' => $data['icon_page'],
            ':type' => $data['type_page'],
            ':order' => $data['order_page'],
            ':date_created' => $data['date_created_page'],
        ]);

        return (int) $this->db->lastInsertId();
    }
}
