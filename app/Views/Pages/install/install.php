<!doctype html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Instalación Dashboard</title>
</head>
<body class="bg-gray-50">

  <div class="min-h-screen flex items-center justify-center py-8 px-4">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-xl w-full">
      <form method="POST" class="needs-validation" novalidate>
        <h3 class="text-2xl font-semibold text-center text-gray-800 mb-4">Instalación Dashboard</h3>

        <div class="border-t border-gray-200 my-4"></div>

        <div class="mb-4">
          <label for="email_admin" class="block text-sm font-medium text-gray-700 mb-1">
            Correo Administrador <sup class="text-gray-600">*</sup>
          </label>

          <input
            type="email"
            class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            id="email_admin"
            name="email_admin"
            required
            aria-required="true"
          >

          <p class="mt-1 text-sm text-green-600 hidden valid-feedback">Válido.</p>
          <p class="mt-1 text-sm text-red-600 hidden invalid-feedback">Campo inválido.</p>
        </div>

        <div class="mb-4">
          <label for="password_admin" class="block text-sm font-medium text-gray-700 mb-1">
            Contraseña Administrador <sup class="text-gray-600">*</sup>
          </label>

          <input
            type="password"
            class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            id="password_admin"
            name="password_admin"
            required
            aria-required="true"
          >

          <p class="mt-1 text-sm text-green-600 hidden valid-feedback">Válido.</p>
          <p class="mt-1 text-sm text-red-600 hidden invalid-feedback">Campo inválido.</p>
        </div>

        <div class="mb-4">
          <label for="title_admin" class="block text-sm font-medium text-gray-700 mb-1">
            Nombre del Dashboard <sup class="text-gray-600">*</sup>
          </label>

          <input
            type="text"
            class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            id="title_admin"
            name="title_admin"
            required
            aria-required="true"
          >

          <p class="mt-1 text-sm text-green-600 hidden valid-feedback">Válido.</p>
          <p class="mt-1 text-sm text-red-600 hidden invalid-feedback">Campo inválido.</p>
        </div>

        <div class="mb-4">
          <label for="symbol_admin" class="block text-sm font-medium text-gray-700 mb-1">
            Símbolo del Dashboard <sup class="text-gray-600">*</sup>
          </label>

          <input
            type="text"
            class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            id="symbol_admin"
            name="symbol_admin"
            required
            aria-required="true"
          >

          <p class="mt-1 text-sm text-green-600 hidden valid-feedback">Válido.</p>
          <p class="mt-1 text-sm text-red-600 hidden invalid-feedback">Campo inválido.</p>
        </div>

        <div class="mb-4">
          <label for="font_admin" class="block text-sm font-medium text-gray-700 mb-1">
            Tipografía del Dashboard
          </label>

          <textarea
            class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            id="font_admin"
            name="font_admin"
            rows="3"
          ></textarea>
        </div>

        <div class="mb-4">
          <label for="color_admin" class="block text-sm font-medium text-gray-700 mb-1">
            Color del Dashboard
          </label>

          <div class="flex items-center gap-3">
            <input
              type="color"
              id="color_admin"
              name="color_admin"
              value="#000000"
              title="Escoge Color"
              class="h-10 w-12 p-0 border border-gray-300 rounded-md cursor-pointer"
            >
            <input
              type="text"
              id="color_preview"
              class="flex-1 rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-700"
              value="#000000"
              readonly
            >
          </div>
        </div>

        <div class="mb-4">
          <label for="back_admin" class="block text-sm font-medium text-gray-700 mb-1">
            Imagen para el Login
          </label>

          <input
            type="text"
            class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            id="back_admin"
            name="back_admin"
          >
        </div>

        <p class="text-xs text-gray-500"><sup class="text-gray-600">*</sup> Campos Obligatorios</p>

        <button type="submit" class="mt-6 w-full bg-gray-900 text-white py-2 rounded-md hover:bg-gray-800 transition-colors">
          Instalar
        </button>

        <?php

        require_once __DIR__ . '/../../../Controllers/installController.php';
        use Arancamon\CmsBuilderPhp\Controllers\installController;
        $install = new installController();
        $install->install();
        ?>

      </form>
    </div>
  </div>

  <script  src="/js/forms/forms.js">
    // Validación estilo "Bootstrap" pero con Tailwind
    
  </script>

</body>
