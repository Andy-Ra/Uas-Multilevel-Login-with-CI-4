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
        <div class="container center">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card mt-4">
                        <div class="card-header">
                            <b>Buat Akun Karyawan</b>
                        </div>

                        <div class="card-body">
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <h4>Periksa Entrian Form</h4>
                                    </hr />
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <form method="post" action="<?= base_url(); ?>/tambaha_process">
                                <?= csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="floatingInput">Alamat Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingPassword">Kata Sandi</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi">
                                </div>
                                <div class="nav justify-content-end">
                                    <a href="<?= site_url("/Tambah_Karyawan") ?>" class="btn btn-danger mr-3">BATAL</a>
                                    <button class="btn btn-success">SIMPAN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->endsection() ?>
</body>