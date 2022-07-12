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
                        <th>No HP</th>
                        <th>Jumlah Tugas</th>
                        <th>Gaji Pokok</th>
                        <th>Gaji Tugas</th>
                        <th>Bonus</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($detailuang as $row) :
                        $no += 1; ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->Nama; ?></td>
                            <td><?php echo $row->No_Hp; ?></td>
                            <td><?php echo $row->Gaji_Pokok; ?></td>
                            <td><?php echo $row->Gaji_Harian ?></td>
                            <td>
                                
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?= $this->endsection() ?>
</body>