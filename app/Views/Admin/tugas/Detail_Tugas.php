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
                <b>Detail Tugas Karyawan</b>
            </div>
            <div class="card-body">
                <?php
                foreach ($detail_tug as $data) : ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Tugas</label>
                        <input class="form-control" type="text" value="<?= $data->Nama_Tugas; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                        <input class="form-control" type="text" value="<?= $data->Nama; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Dimulai Tanggal</label>
                        <input class="form-control" type="text" value="<?= $data->Tanggal_Mulai; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Total Gaji</label>
                        <input class="form-control" type="text" value="<?= $data->Gaji_Harian; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <input class="form-control" type="text" value="<?= $data->status; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                        <input class="form-control" type="text" value="<?= $data->keterangan; ?>" aria-label="readonly input example" readonly>
                    </div>

                    <?= form_open("/hapus_tugas/" . $data->id); ?>
                    <div class="nav justify-content-end ">
                        <button class="btn btn-danger ">HAPUS DATA</button>
                    </div>

                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endsection() ?>
</body>