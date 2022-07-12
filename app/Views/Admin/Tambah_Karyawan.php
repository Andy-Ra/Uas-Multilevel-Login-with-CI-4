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
                <b>Tambah Karyawan</b>
            </div>

            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url(); ?>/tambahk_proses">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                        <input class="form-control" type="nama" value="" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input class="form-control" type="text" value="" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                        <input class="form-control" type="text" value="" name="tempat">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                        <input class="form-control" type="date" value="" name="tanggal">
                    </div>
                    <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki - Laki">
                            <label class="form-check-label">
                                Laki Laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                            <label class="form-check-label">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Hp</label>
                        <input class="form-control" type="number" value="" name="hp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pendidikan</label>
                        <input class="form-control" type="text" value="" name="pendidikan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Gaji Pokok</label>
                        <input class="form-control" type="number" value="" name="gaji">
                    </div>

                    <div class="nav justify-content-end ">
                        <button class="btn btn-warning ">LANJUT</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <?= $this->endsection() ?>
</body>