<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table gerai berdasarkan nik secara Descending
$gerai = query("SELECT * FROM gerai ORDER BY nik DESC");

// Membuat nama file
$filename = "data gerai-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Gerai.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama gerai</th>
            <th>Tanggal</th>
            <th>Alamat</th>
            <th>Problem Gerai</th>
            <th>Status</th>
                        
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($gerai as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nik']; ?></td>
                <td><?= $row['nama_gerai']; ?></td>
                <td><?= $row['tgl']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['problem_gerai']; ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>