<?php
$rows = $rows ?? 3;
?>
<div class="mb-4">
  <label for="<?= $id ?>" class="block text-sm font-medium text-gray-700 mb-1">
    <?= $label ?>
  </label>
  <textarea
    class="block w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
    id="<?= $id ?>"
    name="<?= $name ?>"
    rows="<?= $rows ?>"
  ></textarea>
</div>
