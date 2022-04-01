<?php
date_default_timezone_set('Asia/Jayapura');
session_start();

function setFlash($judul, $isi)
{
    $_SESSION[$judul] = $isi;
}

function isflash($judul)
{
    if (isset($_SESSION[$judul])) {
        return true;
    }
    return false;
}

function flash($judul)
{
    if (isset($_SESSION[$judul])) {
        $judul = $_SESSION[$judul];
        unset($_SESSION[$judul]);
        session_destroy();
        return $judul;
    }
    return false;
}

$conn = mysqli_connect('localhost', 'root', '', 'pingip');

$ip = mysqli_query($conn, "SELECT * FROM daftar_ip");


// untuk tambah ip
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $ip = $_POST['ip'];

    if (mysqli_query($conn, "INSERT INTO `daftar_ip`(`id`, `nama`, `lokasi`, `ip`) VALUES ('','$nama','$lokasi','$ip')")) {
        header("Location: index.php");
        setFlash('Berhasil', "Berhasil menambahkan ip baru");
        exit;
    } else {
        setFlash('Gagal', "Gagal menambahkan ip baru");
        header("Location: Tambah-IP.php");
        exit;
    }
}

// untuk ambil data url
{
    if (isset($_GET['ubah'])) {
        $ubah = $_GET['ubah'];
        $ip = mysqli_query($conn, "SELECT * FROM `daftar_ip` WHERE `id` = $ubah");
        $ip = mysqli_fetch_array($ip);
    }
}

// untuk ubah ip
if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $ip = $_POST['ip'];

    if (mysqli_query($conn, "UPDATE `daftar_ip` SET `nama`='$nama',`lokasi`='$lokasi',`ip`='$ip' WHERE `id` = $ubah")) {
        header("Location: index.php");
        setFlash('Berhasil', "Berhasil mengubah ip");
        exit;
    } else {
        setFlash('Gagal', "Gagal mengubah ip");
        header("Location: Ubah-IP.php?ubah=" . $ubah);
        exit;
    }
}

if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM `daftar_ip` WHERE `id` = $hapus");
    header("Location: index.php");
    setFlash('Berhasil', "Berhasil menghapus ip");
    exit;
}
