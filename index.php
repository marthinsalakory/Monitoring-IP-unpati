<?php include "fungsi.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style data-merge-styles="true"></style>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Monitor Pengecekan Ping Universitas Pattimura</title>
    <link rel="icon" href="assets/logo.png" type="image/png" />
    <link href="assets/hacker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        @media print {
            .noPrint {
                display: none;
            }
        }
    </style>

    <style>
        .tall-row {
            margin-top: 40px;
        }

        .modal {
            position: relative;
            top: auto;
            right: auto;
            left: auto;
            bottom: auto;
            z-index: 1;
            display: block;
        }
    </style>
    <style>
        @media print {
            #ghostery-tracker-tally {
                display: none !important
            }
        }
    </style>
    <script type="text/JavaScript">
        function AutoRefresh( t ) {
            setTimeout("location.reload(true);", t);
        }
	</script>
</head>

<body onload="JavaScript:AutoRefresh(10000);">

    <!-- <a href="https://github.com/brobin/hacker-bootstrap"><img style="position: absolute; top: 0; left: 0; border: 0;z-index:1001;" src="./index_files/fork.png" alt="Universitas Pattimura"></a> -->

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="assets/logo.png" width="30" alt="Logo Unpati"></a>
                <a class="navbar-brand" href="index.php">Monitor Pengecekan Ping</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Tambah-IP.php">Tambah IP!!!</a>
                    </li>
                    <li>
                        <a onclick="print()">Print</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1><img src="assets/logo.png" width="60" alt="Logo Unpatti"> Universitas Pattimura</h1>
            <p class="noPrint">Dibawah ini adalah hasil rekapan ip dari situs-situs universitas pattimura</p>
            <p class="noPrint">Tolong gunakan untuk hal-hal yang bersifat positif</p>
            <p class="noPrint">
                <a class="btn btn-lg btn-primary" href="Tambah-IP.php" role="button">Tambah IP Baru »</a>
                <button class="btn btn-primary" onclick="print()">Print Sekarang</button>
            </p>
        </div>

        <!-- Tables -->
        <div class="row tall-row">
            <?php if (isflash('Berhasil')) : ?>
                <div class="col-lg-12">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close">×</button>
                        <strong>Success!</strong> <?= flash('Berhasil'); ?></a>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-lg-12">
                <h1>Data Ip</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Situs</th>
                            <th>Lokasi</th>
                            <th>IP</th>
                            <th class="text-center">Status</th>
                            <th>Hasil Ping</th>
                            <th>Pembaruan Terakhir</th>
                            <th class="text-center noPrint"><i class="bi bi-gear"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($ip as $ip) : ?>
                            <?php
                            $ipp = $ip['ip'];
                            $pingreply = exec("ping -n 2 $ipp");
                            if (substr($pingreply, -2) == 'ms') {
                                $status = "<i class='bi bi-check'></i>";
                            } else {
                                $status = "<i class='bi bi-x-circle-fill'></i>";
                            }
                            ?>
                            <tr <?= $status == "<i class='bi bi-x-circle-fill'></i>" ? "class='text-danger'" : ''; ?>>
                                <td><?= $i++; ?></td>
                                <td><?= $ip['nama']; ?></td>
                                <td><?= $ip['lokasi']; ?></td>
                                <td><?= $ip['ip']; ?></td>
                                <td class="text-center"><?= $status; ?></td>
                                <td><?= $pingreply; ?></td>
                                <td><?= date("Y-m-d h:i:sa") ?> WIT</td>
                                <td class="text-center noPrint">
                                    <a href="Ubah-IP.php?ubah=<?= $ip['id']; ?>" class="btn btn-warning">Ubah</a>
                                    <a href="index.php?hapus=<?= $ip['id']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row tall-row">
            <div class="col-md-12">
                <p>Created by <a href="https://github.com/marthinsalakory">Marthin Alfreinsco Salakory</a>. © 2022</p>
            </div>
        </div>

    </div>

    <script src="assets/jquery.min.js"></script>
    <script src="assets//bootstrap.min.js"></script>

</html>