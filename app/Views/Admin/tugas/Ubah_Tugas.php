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
                <b>Ubah Tugas Karyawan</b>
            </div>
            <div class="card-body">
                <?php
                foreach ($ubahtug as $data) : ?>
                <?= form_open("/update_tugass/" . $data->id); ?>
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Tugas</label>
                        <input class="form-control" type="text" name="tugas" value="<?= $data->Nama_Tugas; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                        <input class="form-control" type="text" value="<?= $data->Nama; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Dimulai Tanggal</label>
                        <input class="form-control" type="date" name="tanggal" value="<?= $data->Tanggal_Mulai; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Waktu Pengerjaan</label>
                        <input class="form-control" type="number" name="waktu" value="<?= $data->lama_pengerjaan; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gaji Per Hari</label>
                        <input class="form-control" type="number" name="gaji" value="<?= $data->Gaji_Harian?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <input class="form-control" type="text"  name="status" value="<?= $data->status; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                        <input class="form-control" type="text"  name="keterangan" value="<?= $data->keterangan; ?>">
                    </div>
                    <div class="nav justify-content-end ">
                        <button class="btn btn-success ">UBAH DATA</button>
                    </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endsection() ?>
</body>