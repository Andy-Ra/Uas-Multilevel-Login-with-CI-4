<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Karyawan Page</title>
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
</head>

<body>

  <?php if (session()->get('role') != "Karyawan") {
    echo "<script type='text/javascript'>alert('Anda tidak memilki hak akses');</script>";  
  } else { ?>
    <?= $this->include('Layout/navbar') ?>
    <?= $this->include('Karyawan/layout_k/sidebar') ?>
    <?= $this->include('Layout/header') ?>

    <br>

    <?= $this->renderSection('content') ?>


    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
  <?php } ?>
</body>

</html>