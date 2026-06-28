<div class="min-h-screen flex items-center justify-center py-8 px-4">
  <div class="bg-white rounded-xl shadow-lg p-8 max-w-xl w-full">
    <form method="POST" class="needs-validation" novalidate>
      <h3 class="text-2xl font-semibold text-center text-gray-800 mb-4">Instalación Dashboard</h3>

      <div class="border-t border-gray-200 my-4"></div>

      <?php
      $id = 'email_admin'; $name = 'email_admin'; $type = 'email'; $label = 'Correo Administrador'; $required = true;
      include APP . '/Views/Components/input.php';

      $id = 'password_admin'; $name = 'password_admin'; $type = 'password'; $label = 'Contraseña Administrador'; $required = true;
      include APP . '/Views/Components/input.php';

      $id = 'title_admin'; $name = 'title_admin'; $type = 'text'; $label = 'Nombre del Dashboard'; $required = true;
      include APP . '/Views/Components/input.php';

      $id = 'symbol_admin'; $name = 'symbol_admin'; $type = 'text'; $label = 'Símbolo del Dashboard'; $required = true;
      include APP . '/Views/Components/input.php';

      $id = 'font_admin'; $name = 'font_admin'; $label = 'Tipografía del Dashboard';
      include APP . '/Views/Components/textarea.php';

      $id = 'color_admin'; $name = 'color_admin'; $label = 'Color del Dashboard';
      include APP . '/Views/Components/color.php';

      $id = 'back_admin'; $name = 'back_admin'; $type = 'text'; $label = 'Imagen para el Login'; $required = false;
      include APP . '/Views/Components/input.php';
      ?>

      <p class="text-xs text-gray-500"><sup class="text-gray-600">*</sup> Campos Obligatorios</p>

      <?php
      $text = 'Instalar';
      include APP . '/Views/Components/button.php';
      ?>

    </form>
  </div>
</div>

<?php if (!empty($useSweetAlert)): ?>
<script>
document.querySelector('.needs-validation').addEventListener('submit', function (e) {
  e.preventDefault();

  const form = this;
  if (!form.checkValidity()) return;

  fncMatPreloader('on');
  fncSweetAlert('loading', 'Instalando...', '');

  const formData = new FormData(form);

  fetch(window.location.href, {
    method: 'POST',
    body: formData,
  })
    .then(r => r.json())
    .then(data => {
      fncMatPreloader('off');
      Swal.close();

      if (data.success) {
        fncSweetAlert('success', data.message, '<?= BASE_URL ?>admin/');
      } else {
        fncSweetAlert('error', data.message, '');
      }
    })
    .catch(() => {
      fncMatPreloader('off');
      Swal.close();
      fncSweetAlert('error', 'Error de conexión con el servidor.', '');
    });
});
</script>
<?php endif; ?>
