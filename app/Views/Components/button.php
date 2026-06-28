<?php
$type = $type ?? 'submit';
$class = $class ?? 'mt-6 w-full bg-gray-900 text-white py-2 rounded-md hover:bg-gray-800 transition-colors';
?>
<button type="<?= $type ?>" class="<?= $class ?>">
  <?= $text ?>
</button>
