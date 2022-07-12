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
                <b>Daftar Karyawan</b>
            </div>

            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Nama Tugas</th>
                        <th>Tanggal Mulai</th>
                        <th>Lama Pengerjaan</th>
                        <th>Total Gaji</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($tugaskar as $row) :
                        $no += 1; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->Nama; ?></td>
                            <td><?php echo $row->Nama_Tugas; ?></td>
                            <td><?php echo $row->Tanggal_Mulai; ?></td>
                            <td><?php echo $row->lama_pengerjaan; ?></td>
                            <td><?php echo $row->lama_pengerjaan * $row->Gaji_Harian; ?></td>
                            <td><?php echo $row->keterangan; ?></td>
                            <td>
                                <a class="btn btn-danger" href="/hapus_karyawan/<?= $row->No_Karyawan; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?= $this->endsection() ?>
</body>