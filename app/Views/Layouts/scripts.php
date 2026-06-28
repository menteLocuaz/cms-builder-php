<script src="<?= ASSETS ?>/plugins/jquery/jquery.min.js"></script>

<script defer src="<?= ASSETS ?>/plugins/alpinejs/alpine.min.js"></script>

<?php if (!empty($useChartJs)): ?>
<script src="<?= ASSETS ?>/plugins/chart.js/chart.umd.min.js"></script>
<?php endif; ?>

<?php if (!empty($useQuill)): ?>
<script src="<?= ASSETS ?>/plugins/quill/quill.min.js"></script>
<?php endif; ?>

<?php if (!empty($useTagify)): ?>
<script src="<?= ASSETS ?>/plugins/tagify/tagify.min.js"></script>
<?php endif; ?>

<?php if (!empty($useToastify)): ?>
<script src="<?= ASSETS ?>/plugins/toastify-js/toastify.min.js"></script>
<?php endif; ?>

<?php if (!empty($useSweetAlert)): ?>
<script src="<?= ASSETS ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<?php endif; ?>

<?php if (!empty($useFormsJs)): ?>
<script src="<?= ASSETS ?>/js/forms/forms.js"></script>
<?php endif; ?>

<script src="<?= ASSETS ?>/js/app.js"></script>

<script src="<?= ASSETS ?>/js/alerts/alerts.js"></script>
