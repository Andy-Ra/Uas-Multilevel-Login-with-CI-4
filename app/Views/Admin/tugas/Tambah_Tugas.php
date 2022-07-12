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
                <b>Tambah Tugas</b>
            </div>

            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url(); ?>/tambaht_proses">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                        <select class="form-label w-100" name="id_kar" required>
                            <option selected disabled value="">Pilih Karyawan</option>
                            <?php
                                 foreach ($tugaskar as $kar) :
                                    echo'<option value="'.$kar->id_user.'">'."$kar->Nama".'</option>';
                                endforeach; 
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Tugas</label>
                        <input class="form-control" type="nama" value="" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Mulai</label>
                        <input class="form-control" type="date" value="" name="tanggal">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gaji Harian</label>
                        <input class="form-control" type="number" value="" name="gaji">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan (Opsional)</label>
                        <input class="form-control" type="text" value="" name="keterangan">
                    </div>
                    <div class="nav justify-content-end ">
                        <button class="btn btn-success ">SIMPAN</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <?= $this->endsection() ?>
</body>