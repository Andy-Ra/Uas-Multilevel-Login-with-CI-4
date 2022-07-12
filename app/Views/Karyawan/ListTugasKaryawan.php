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
                <b>List Tugas</b>
            </div>

            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Tugas</th>
                        <th>Tanggal Mulai</th>
                        <th>Jangka Waktu</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($tugaskar as $row) :
                        $no += 1; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->Nama_Tugas; ?></td>
                            <td><?php echo $row->Tanggal_Mulai;?></td>
                            <td><?php echo $row->lama_pengerjaan. " Hari"; ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td><?php echo $row->keterangan; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?= $this->endsection() ?>
</body>