<?php
include_once("config.php"); // Sertakan file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil ID dari URL
    $id = $_GET['id'];

    // Ambil data dari form
    $nama_alat = $_POST['nama_alat'];
    $tahun = $_POST['tahun'];
    $merek = $_POST['merek'];
    $nomor_seri = $_POST['nomor_seri'];
    $lokasi = $_POST['lokasi'];

    // Validasi data (misalnya, pastikan tidak kosong)
    if (!empty($nama_alat) && !empty($tahun) && !empty($merek) && !empty($nomor_seri) && !empty($lokasi)) {
        // Siapkan dan bind
        $stmt = $mysqli->prepare("UPDATE barang SET nama_alat=?, tahun=?, merek=?, nomor_seri=?, lokasi=? WHERE id=?");
        $stmt->bind_param("sssssi", $nama_alat, $tahun, $merek, $nomor_seri, $lokasi, $id);

        // Eksekusi statement
        if ($stmt->execute()) {
            echo "Data berhasil diperbarui!";
            // Redirect atau tampilkan pesan sukses
            header("Location: home.php"); // Arahkan kembali ke halaman home setelah berhasil
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Semua field harus diisi!";
    }
}

// Tutup koneksi
$mysqli->close();
?>