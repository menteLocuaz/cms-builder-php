<form method="POST" action="<?= BASE_URL ?>logout" class="w-full">
    <input type="hidden" name="logout" value="1">
    <button
        type="submit"
        class="w-full flex items-center gap-3 px-4 py-3 hover:bg-gray-700 rounded-lg transition-colors text-white"
        :class="collapsed ? 'justify-center' : ''"
    >
        <i class="fas fa-sign-out-alt"></i>
        <template x-if="!collapsed">
            <span>Logout</span>
        </template>
    </button>
</form>