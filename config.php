<?php
// Mengatur konfigurasi database
$databaseHost = 'localhost';
$databaseName = 'kapal';
$databaseUsername = 'root';
$databasePassword = '';  // Sesuaikan dengan password MySQL Anda

// Membuat koneksi ke database
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Mengecek koneksi database
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>