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
        <div class="card mt-3">

            <div class="card-header">
                <b>Detail Karyawan</b>
            </div>
            <div class="card-body">
                <?php
                foreach ($detail_kar as $data) : ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                        <input class="form-control" type="text" value="<?= $data->Nama; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input class="form-control" type="text" value="<?= $data->Alamat; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                        <input class="form-control" type="text" value="<?= $data->Tempat_Lahir; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                        <input class="form-control" type="text" value="<?= $data->Tanggal_Lahir; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                        <input class="form-control" type="text" value="<?= $data->Jenis_Kelamin; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
                        <input class="form-control" type="text" value="<?= $data->Email; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No HP</label>
                        <input class="form-control" type="text" value="<?= $data->No_Hp; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pendidikan</label>
                        <input class="form-control" type="text" value="<?= $data->Pendidikan; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gaji Pokok</label>
                        <input class="form-control" type="text" value="<?= $data->Gaji_Pokok; ?>" aria-label="readonly input example" readonly>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endsection() ?>
</body>