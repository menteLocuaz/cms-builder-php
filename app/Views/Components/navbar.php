<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
            <button class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800"><?= $admin['title_admin'] ?? 'Dashboard' ?></h1>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative">
                <button class="p-2 rounded-lg hover:bg-gray-100 relative">
                    <i class="fas fa-bell text-gray-600"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
            </div>

            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-user text-gray-600"></i>
                </div>
                <div class="hidden md:block">
                    <p class="text-sm font-medium text-gray-800"><?= $admin['rol_admin'] ?? 'Admin' ?></p>
                    <p class="text-xs text-gray-500"><?= $admin['email_admin'] ?? 'admin@example.com' ?></p>
                </div>
            </div>
        </div>
    </div>
</header>
