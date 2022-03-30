<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nik = htmlspecialchars($data['nik']);
    $nama_gerai = htmlspecialchars($data['nama_gerai']);
    $tgl = $data['tgl'];
    $alamat = htmlspecialchars($data['alamat']);
    $problem_gerai = htmlspecialchars($data['problem_gerai']);
    $gambar = upload();
    $status = $data['status'];

    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO gerai VALUES ('$nik','$nama_gerai','$tgl','$alamat','$problem_gerai','$gambar','$status')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nik)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM gerai WHERE nik = $nik");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nik = $data['nik'];
    $nama_gerai = htmlspecialchars($data['nama_gerai']);
    $tgl = $data['tgl'];
    $alamat = htmlspecialchars($data['alamat']);
    $problem_gerai = htmlspecialchars($data['problem_gerai']);
    $gambarLama = $data['gambarLama'];
    $status = $data['status'];
  
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE gerai SET nama_gerai = '$nama_gerai', tgl = '$tgl', alamat = '$alamat', problem_gerai = '$problem_gerai', gambar = '$gambar', status = '$status' WHERE nik = $nik";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi upload gambar
function upload()
{
    // Syarat
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}
