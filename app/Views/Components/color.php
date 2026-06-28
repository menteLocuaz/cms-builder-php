<?php
$value = $value ?? '#000000';
?>
<div class="mb-4">
  <label for="<?= $id ?>" class="block text-sm font-medium text-gray-700 mb-1">
    <?= $label ?>
  </label>
  <div class="flex items-center gap-3">
    <input
      type="color"
      id="<?= $id ?>"
      name="<?= $name ?>"
      value="<?= $value ?>"
      title="Escoge Color"
      class="h-10 w-12 p-0 border border-gray-300 rounded-md cursor-pointer"
    >
    <input
      type="text"
      id="<?= $id ?>_preview"
      class="flex-1 rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-700"
      value="<?= $value ?>"
      readonly
    >
  </div>
</div>
