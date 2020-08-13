<?php

use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?= ucfirst(Configure::read('Site.name')) ?> |
        <?php echo ucwords($this->fetch('title')); ?> <?= ucwords($this->fetch('heading')); ?>
    </title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <?php echo $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?php echo $this->Html->css('admin.min'); ?>
    <?= $this->fetch('css') ?>
    <?php echo $this->Html->script([
        // "test/piexif.min",
        "admin/admin.min",
        "admin/bootstrap.bundle.min",
        "admin/adminlte"
    ]);
    ?>
    <script>
        var basePath = "<?php echo $this->Url->build('/', ['escape' => false, 'fullBase' => true]); ?>"
    </script>
    <?php // echo $this->Html->script(["temporaire/bootstrap"]); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-<?php // echo Configure::read('Theme.skin');?> sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <?php echo $this->element('nav-top'); ?>
        </nav>
        <?php echo $this->element('aside-main-sidebar'); ?>
        <div class="content-wrapper">
            <?php echo $this->element("breadcrumb"); ?>
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <?php echo $this->element('footer'); ?>
        <!-- Control Sidebar -->
        <?php // echo $this->element('aside-control-sidebar'); ?>
        <div class="control-sidebar-bg"></div>
    </div>
    <?php echo $this->fetch('scriptBottom'); ?>
</body>

</html>
