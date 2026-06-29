<?php if (!empty($admin)): ?>
<?php

$menuItems = [
    ['label' => 'Dashboard', 'icon' => 'fas fa-home', 'url' => BASE_URL . 'admin'],
    ['label' => 'Pages', 'icon' => 'fas fa-file', 'url' => BASE_URL . 'admin/pages'],
    ['label' => 'Modules', 'icon' => 'fas fa-puzzle-piece', 'url' => BASE_URL . 'admin/modules'],
    ['label' => 'Columns', 'icon' => 'fas fa-columns', 'url' => BASE_URL . 'admin/columns'],
    ['label' => 'Settings', 'icon' => 'fas fa-cog', 'url' => BASE_URL . 'admin/settings'],
];

$adminName = $_SESSION['admin']['name'] ?? 'Admin';
$adminEmail = $_SESSION['admin']['email'] ?? 'admin@example.com';
?>
<div class="flex min-h-screen" x-data="{ sidebarCollapsed: false }">
    <?php require APP . '/Views/Components/sidebar.php'; ?>

    <div class="flex-1 flex flex-col">
        <?php require APP . '/Views/Components/navbar.php'; ?>

        <main class="flex-1 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Pages</p>
                            <p class="text-2xl font-bold text-gray-800">12</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Modules</p>
                            <p class="text-2xl font-bold text-gray-800">8</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-puzzle-piece text-green-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Columns</p>
                            <p class="text-2xl font-bold text-gray-800">24</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-columns text-purple-600"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Active Admins</p>
                            <p class="text-2xl font-bold text-gray-800">3</p>
                        </div>
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-orange-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-blue-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">New page created</p>
                            <p class="text-xs text-gray-500">Homepage - 2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-edit text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Module updated</p>
                            <p class="text-xs text-gray-500">Contact Form - 5 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-trash text-purple-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Column deleted</p>
                            <p class="text-xs text-gray-500">Sidebar - 1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php endif;

