
<div
    class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center px-4"
    <?php if (!empty($admin['back_admin'])): ?>
        style="background-image:url('<?= htmlspecialchars($admin['back_admin']) ?>')"
    <?php else: ?>
        style="background:#f0f0f5"
    <?php endif; ?>
>

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

        <form method="POST" novalidate>

            <h1 class="text-2xl font-bold text-center text-gray-800">
                <?php if (!empty($admin['symbol_admin'])): ?>
                    <i class="<?= htmlspecialchars($admin['symbol_admin']) ?>"></i>
                <?php endif; ?>
                <?= htmlspecialchars($admin['title_admin'] ?? '') ?>
            </h1>

            <hr class="my-6 border-gray-200">

            <?php if (empty($securityCode)): ?>

                <?php

                $id = 'email_admin';
                $name = 'email_admin';
                $type = 'email';
                $label = 'Correo';
                $required = true;
                include APP . '/Views/Components/input.php';
                ?>

                <div class="mb-5">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password_admin" class="text-sm font-medium text-gray-700">
                            Contraseña
                        </label>
                        <a href="#resetPassword" class="text-xs text-indigo-600 hover:underline">
                            ¿Olvidaste la contraseña?
                        </a>
                    </div>
                    <div class="relative">
                        <input
                            type="password"
                            id="password_admin"
                            name="password_admin"
                            placeholder="Escribe la contraseña"
                            required
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 pr-12 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 outline-none">
                        <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                            <i class="viewPass fa-solid fa-eye-slash" state="locked"></i>
                        </button>
                    </div>
                    <p class="hidden text-green-600 text-sm mt-1 valid-feedback">Válido.</p>
                    <p class="hidden text-red-600 text-sm mt-1 invalid-feedback">Campo inválido.</p>
                </div>

                <div class="flex items-center gap-2 mb-5">
                    <input type="checkbox" id="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember" class="text-sm text-gray-700">
                        Recordar ingreso
                    </label>
                </div>

            <?php else: ?>

                <?php

                $id = 'scode_admin';
                $name = 'scode_admin';
                $type = 'text';
                $label = 'Código de seguridad';
                $required = true;
                include APP . '/Views/Components/input.php';
                ?>

            <?php endif; ?>

            <?php

            $text = 'Enviar';
            include APP . '/Views/Components/button.php';
            ?>

        </form>

    </div>

</div>

<?php if (!empty($useSweetAlert)): ?>
<script>
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    if (!form.checkValidity()) return;

    fncMatPreloader(true);
    UI.loading('Iniciando sesión...');

    const formData = new FormData(form);

    fetch(window.location.href, {
        method: 'POST',
        body: formData,
    })
    .then(r => r.json())
    .then(data => {
        fncMatPreloader(false);
        UI.close();

        if (data.success) {
            UI.alert('success', data.message, '<?= BASE_URL ?>/');
        } else {
            UI.alert('error', data.message);
        }
    })
    .catch(() => {
        fncMatPreloader(false);
        UI.close();
        UI.alert('error', 'Error de conexión con el servidor.');
    });
});
</script>
<?php endif;
