<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title><?= $title ?? 'CMS Builder' ?></title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/9966/9966194.png">

	  <link rel="preconnect" href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="<?= ASSETS ?>/css/style.css">

    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/fontawesome-free/css/all.min.css">

    <?php if (!empty($useNProgress)): ?>
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/nprogress/nprogress.min.css">
    <script src="<?= ASSETS ?>/plugins/nprogress/nprogress.min.js"></script>
    <?php endif; ?>

</head>
