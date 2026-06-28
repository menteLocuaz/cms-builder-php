<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title><?= $admin['title_admin'] ?? 'CMS Builder' ?></title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/9966/9966194.png">

	  <link rel="preconnect" href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

     <?php if ($admin['font_admin'] != null): ?>
     <?= $admin['font_admin'] ?>
     <?php endif ?>

    <link rel="stylesheet" href="<?= ASSETS ?>/css/style.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/fontawesome-free/css/all.min.css">


        <?php if (!empty($useNProgress)): ?>
    <link rel="stylesheet" href="<?= ASSETS ?>/plugins/nprogress/nprogress.min.css">
    <script src="<?= ASSETS ?>/plugins/nprogress/nprogress.min.js"></script>
    <?php endif; ?>

    <?php if ($admin['color_admin'] != null): ?>
    <style>
        <?php if ($admin['font_admin'] != null):?>
        body{
            font-family: <?php echo str_replace("+"," ",explode("=",explode(":",explode("?",$admin['font_admin'])[1])[0])[1]) ?>, sans-serif !important;
        }
        <?php endif ?>
        .backColor{ background: <?= $admin['color_admin'] ?> !important; color: #FFF !important; border: 0 !important; }
        .form-check-input:checked{ background-color: <?= $admin['color_admin'] ?> !important; border-color: <?= $admin['color_admin'] ?> !important; }
        .textColor{ color: <?= $admin['color_admin'] ?> !important; }
        .page-item.active .page-link { z-index: 3; color: #fff !important; background-color: <?= $admin['color_admin'] ?> !important; border-color: <?= $admin['color_admin'] ?> !important; }
        .page-link { color: <?= $admin['color_admin'] ?> !important; }
    </style>
    <?php endif ?>

</head>
