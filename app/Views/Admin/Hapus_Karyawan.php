<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
</head>

<body>
    <?= $this->extend('Admin/layout/page_layout') ?>
    <?= $this->section('content') ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>Hapus Data Karyawan</h2>
                        <p>Apakah Anda Yakin ??</p>

                        <?= form_open("hapus_karyawan/ya/".$hapus_kar->No_Karyawan) ?>
                        <button class="btn btn-primary">Ya</button>
                        <a href="<?= site_url('/list_karyawan') ?>" class="btn btn-danger">Tidak</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?= $this->endsection() ?>
</body>