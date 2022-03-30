<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data gerai berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data gerai gagal ditambahkan!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>DATA SERVICE CENTER JOGJA</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">DATA SERVICE CENTER JOGJA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah DATA GERAI YANG DIKUNJUNGI</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control w-50" id="nik" placeholder="Masukkan NIK" min="1" name="nik" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_gerai" class="form-label">NAMA GERAI</label>
                        <input type="text" class="form-control form-control-md w-50" id="nama_gerai" placeholder="Masukkan Nama Gerai" name="nama_gerai" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl" class="form-label">TANGGAL</label>
                        <input type="date" class="form-control w-50" id="tgl" name="tgl" max="01-01-2200" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">ALAMAT GERAI</label>
                        <textarea class="form-control w-50" id="alamat" rows="5" name="alamat" placeholder="Masukkan Alamat Gerai" autocomplete="off" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="problem_gerai" class="form-label">PROBLEM GERAI</label>
                        <textarea class="form-control w-50" id="problem_gerai" rows="5" name="problem_gerai" placeholder="Masukkan Masalah Gerai" autocomplete="off" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Foto IT Support</label>
                        <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">STATUS</label>
                        <select class="form-select w-50" id="status" name="status">
                            <option disabled selected value>--------------------------------------------PILIH STATUS--------------------------------------------</option>
                            <option value="on progress">On Progress</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                                    
                    <hr>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->



    <!-- Footer -->
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-md-6 my-2">
                <h4 class="fw-bold text-uppercase">About</h4>
                <p>Aplikasi Ini Hanya Digunakan Untuk Pendataan Kunjungan Service Ke Gerai</p>
            </div>
            <div class="col-md-6 my-2 text-center link">
                <h4 class="fw-bold text-uppercase">Account Links</h4>
                <a href="https://www.facebook.com/radeniman.setyonugroho" target="_blank"><i class="bi bi-facebook fs-3"></i></a>
                <a href="https://github.com/radeniman08" target="_blank"><i class="bi bi-github fs-3"></i></a>
                <a href="https://www.instagram.com/radenimansn__/" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
                <a href="https://twitter.com/RadenImansn" target="_blank"><i class="bi bi-twitter fs-3"></i></a>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
        <p>Created with <i class="bi bi-suit-heart-fill" style="color: red;"></i> by <a href="https://www.instagram.com/radenimansn__" target="_blank" style="color: #fff;">Raden Iman Setio Nugroho</a></p>
    </footer>
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>