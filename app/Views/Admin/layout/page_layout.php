<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page</title>
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
</head>

<body>

  <?= $this->include('Admin/layout/navbar') ?>
  <?= $this->include('Admin/layout/sidebar') ?>
  <?= $this->include('Admin/layout/header') ?>

  <br>

  <?= $this->renderSection('content') ?>


  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>