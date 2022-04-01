<?php include "fungsi.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style data-merge-styles="true"></style>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Monitor Pengecekan Ping Universitas Pattimura</title>
    <link href="assets/hacker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="assets/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#tambah_ip").click(function() {
                if ($('#nama').val() == '' && $('#ip').val() == '') {
                    $('#nama_situs').attr('class', 'form-group has-error');
                    $('#ip_situs').attr('class', 'form-group has-error');
                    $('#pesan-error').show();
                    return false;
                } else {
                    $('#nama_situs').attr('class', 'form-group');
                    $('#ip_situs').attr('class', 'form-group');
                    $('#pesan-error').hide();
                }

                if ($('#nama').val() == '') {
                    $('#nama_situs').attr('class', 'form-group has-error');
                    $('#pesan-error').show();
                    return false;
                } else {
                    $('#nama_situs').attr('class', 'form-group');
                    $('#pesan-error').hide();
                }

                if ($('#ip').val() == '') {
                    $('#ip_situs').attr('class', 'form-group has-error');
                    $('#pesan-error').show();
                    return false;
                } else {
                    $('#ip_situs').attr('class', 'form-group');
                    $('#pesan-error').hide();
                }
            });
        });
    </script>

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
</head>

<body>

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
                <a class="navbar-brand" href="index.php"><img src="assets/logo.png" width="30" alt=""></a>
                <a class="navbar-brand" href="index.php">Monitor Pengecekan Ping</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Tambah-IP.php">Tambah IP!!!</a>
                    </li>
                    <li>
                        <a href="index.php">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1><img src="assets/logo.png" width="60" alt=""> Universitas Pattimura</h1>
            <p>Dibawah ini adalah form pengubahan IP situs-situs Universitas Pattimura</p>
            <p>Tolong gunakan untuk hal-hal yang bersifat positif</p>
            <p>
                <a class="btn btn-lg btn-primary" href="index.php" role="button">Kembali »</a>
                <a class="btn btn-primary" href="Tambah-IP.php">Refresh Halaman</a>
            </p>
        </div>

        <!-- Forms  -->
        <div class="row tall-row">
            <div class="col-lg-12">
                <h1>Forms pengubahan ip</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="well">
                    <form class="form-horizontal" method="POST">
                        <fieldset>
                            <div style="display: none;" class="alert alert-dismissible alert-danger" id="pesan-error">
                                <strong>Error!</strong> Semua inputan harus diisi.
                            </div>
                            <legend>Ubah IP</legend>
                            <div class="form-group" id="nama_situs">
                                <label for="nama" class="col-lg-2 control-label">Nama Situs</label>
                                <div class="col-lg-10">
                                    <input autocomplete="off" class="form-control" name="nama" id="nama" placeholder="Masukan nama situs disini" type="text" spellcheck="false" data-ms-editor="true" value="<?= $ip['nama']; ?>">
                                </div>
                            </div>
                            <div class="form-group" id="ip_situs">
                                <label for="ip" class="col-lg-2 control-label">IP Baru</label>
                                <div class="col-lg-10">
                                    <input autocomplete="off" class="form-control" name="ip" id="ip" placeholder="Masukan Ip Baru disini" type="text" spellcheck="false" data-ms-editor="true" value="<?= $ip['ip']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Lokasi</label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Umum' ? 'checked' : '' ?> name="lokasi" id="lokasi1" value="Umum" checked="" type="radio">
                                            Umum
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Ekonomi dan Bisnis' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Ekonomi dan Bisnis" type="radio">
                                            Fakultas Ekonomi dan Bisnis
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Hukum' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Hukum" type="radio">
                                            Fakultas Hukum
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Kedokteran' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Kedokteran" type="radio">
                                            Fakultas Kedokteran
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Ilmu Sosial dan Ilmu Politik' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Ilmu Sosial dan Ilmu Politik" type="radio">
                                            Fakultas Ilmu Sosial dan Ilmu Politik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Teknik' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Teknik" type="radio">
                                            Fakultas Teknik
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Pertanian' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Pertanian" type="radio">
                                            Fakultas Pertanian
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Matematika dan Ilmu Pengetahuan Alam' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Matematika dan Ilmu Pengetahuan Alam" type="radio">
                                            Fakultas Matematika dan Ilmu Pengetahuan Alam
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Keguruan dan Ilmu Pendidikan' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Keguruan dan Ilmu Pendidikan" type="radio">
                                            Fakultas Keguruan dan Ilmu Pendidikan
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input <?= $ip['lokasi'] == 'Fakultas Perikanan dan Ilmu Kelautan' ? 'checked' : '' ?> name="lokasi" id="lokasi2" value="Fakultas Perikanan dan Ilmu Kelautan" type="radio">
                                            Fakultas Perikanan dan Ilmu Kelautan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button name="ubah" id="tambah_ip" type="submit" class="btn btn-primary">Ubah IP</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class="row tall-row">
            <div class="col-md-12">
                <p>Created by <a href="https://github.com/marthinsalakory" target="_blank">Marthin Alfreinsco Salakory</a>. © 2022</p>
            </div>
        </div>

    </div>

    <script src="assets/bootstrap.min.js"></script>

</body>

</html>