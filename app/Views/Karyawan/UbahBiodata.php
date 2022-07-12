<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
</head>

<body>
    <?= $this->extend('Karyawan/layout_k/page_layout') ?>
    <?= $this->section('content') ?>
    <div class="container">
        <div class="card mt-3">

            <div class="card-header">
                <b>Ubah</b>
            </div>
            <div class="card-body">
                <?php
                foreach ($biodata_kar as $data) : ?>
                 <?= form_open('/update_biodata/'.$data->id) ?>
                 <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                        <input class="form-control" type="text" value="<?= $data->Nama; ?>" aria-label="readonly input example" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input class="form-control" type="text" name="alamat" value="<?= $data->Alamat; ?>" aria-label="readonly input example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                        <input class="form-control" type="text" name="tempat" value="<?= $data->Tempat_Lahir; ?>" aria-label="readonly input example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tgl" value="<?= $data->Tanggal_Lahir; ?>" aria-label="readonly input example">
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
                        <input class="form-control" type="number" name="hp" value="<?= $data->No_Hp; ?>" aria-label="readonly input example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pendidikan</label>
                        <input class="form-control" type="text" value="<?= $data->Pendidikan; ?>" aria-label="readonly input example" readonly>
                    </div>
                <button class="btn btn-primary" >Simpan</button>

                    </form>
                    
                <?php endforeach; ?>
               
            </div>
        </div>
    </div>
    </div>
    <?= $this->endsection() ?>
</body>