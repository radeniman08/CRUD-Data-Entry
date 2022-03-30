<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataGerai diklik maka
if (isset($_POST['dataGerai'])) {
    $output = '';

    // mengambil data gerai dari nik yang berasal dari dataGerai
    $sql = "SELECT * FROM gerai WHERE nik = '" . $_POST['dataGerai'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">NIK</th>
                            <td width="60%">' . $row['nik'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama Gerai</th>
                            <td width="60%">' . $row['nama_gerai'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tanggal</th>
                            <td width="60%">' . $row['tgl'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                         </tr>
                         <tr>
                            <th width="40%">Problem Gerai</th>
                            <td width="60%">' . $row['problem_gerai'] . '</td>
                         </tr>
                        <tr>
                            <th width="40%">Status</th>
                            <td width="60%">' . $row['status'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
