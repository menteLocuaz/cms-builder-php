<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title><?= $title ?? 'CMS Builder' ?></title>

    <link rel="stylesheet" href="<?= ASSETS ?>/css/style.css">

    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/fontawesome-free/css/all.min.css">

    <?php if (!empty($usePace)): ?>
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/pace/pace-theme-default.min.css">
    <script src="<?= ASSETS ?>/plugins/pace/pace.min.js"></script>
    <?php endif; ?>

</head>
