<?php
$required = $required ?? false;
$type = $type ?? 'text';
$sup = $required ? ' <sup class="text-gray-600">*</sup>' : '';
?>
<div class="mb-4">
  <label for="<?= $id ?>" class="block text-sm font-medium text-gray-700 mb-1">
    <?= $label ?><?= $sup ?>
  </label>
  <input
    type="<?= $type ?>"
    class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
    id="<?= $id ?>"
    name="<?= $name ?>"
    <?= $required ? 'required aria-required="true"' : '' ?>
  >
  <?php if ($required): ?>
  <p class="mt-1 text-sm text-green-600 hidden valid-feedback">Válido.</p>
  <p class="mt-1 text-sm text-red-600 hidden invalid-feedback">Campo inválido.</p>
  <?php endif; ?>
</div>
