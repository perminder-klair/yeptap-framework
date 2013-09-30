<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title><?php echo SITE_NAME; ?> - Yeptap Framework</title>

    <link rel="stylesheet" href="<?php echo yeptap\helpers\Yeptap::themeBase(); ?>css/main.css">
</head>
<body>
    <h1><?php echo SITE_NAME; ?></h1>
    <hr />

    <?php include ($viewFile); ?>

    <hr />
    <p><small>Copyright &copy; <?php echo date('Y'); ?> by <?php echo SITE_NAME; ?>.</small></p>
</body>
</html>