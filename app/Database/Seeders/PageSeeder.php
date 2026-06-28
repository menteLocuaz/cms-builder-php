<?php

declare(strict_types=1);

namespace Arancamon\CmsBuilderPhp\Database\Seeders;

use Arancamon\CmsBuilderPhp\Services\PageService;

class PageSeeder
{
    public function __construct(
        private PageService $pageService
    ) {}

    public function run(string $today): array
    {
        $pages = require database_path('seeders/data/pages.php');
        $pageIds = [];

        foreach ($pages as $page) {
            $pageIds[$page['url_page']] = $this->pageService->create(
                array_merge($page, ['date_created_page' => $today])
            );
        }

        return $pageIds;
    }
}
