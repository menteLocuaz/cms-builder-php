<aside
    x-data="{ collapsed: false }"
    :class="collapsed ? 'w-16' : 'w-64'"
    class="bg-gray-900 text-white min-h-screen transition-all duration-300 ease-in-out flex flex-col"
>
    <div class="flex items-center justify-between p-4 border-b border-gray-700">
        <template x-if="!collapsed">
            <span class="text-xl font-bold"><?= $admin['title_admin'] ?? 'Dashboard' ?></span>
        </template>
        <button
            @click="collapsed = !collapsed"
            class="p-2 rounded-lg hover:bg-gray-700 transition-colors"
        >
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <nav class="flex-1 py-4">
        <?php foreach ($menuItems as $item): ?>
        <a
            href="<?= $item['url'] ?? '#' ?>"
            class="flex items-center gap-3 px-4 py-3 hover:bg-gray-700 transition-colors"
            :class="collapsed ? 'justify-center' : ''"
        >
            <i class="<?= $item['icon'] ?? 'fas fa-circle' ?>"></i>
            <template x-if="!collapsed">
                <span><?= $item['label'] ?? '' ?></span>
            </template>
        </a>
        <?php endforeach; ?>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <?php require APP . '/Views/Components/logout.php'; ?>
    </div>
</aside>

