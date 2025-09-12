<?php
// Konfigurasi database
$host = "localhost";
$user = "root";   // ganti sesuai user database
$pass = "";       // ganti sesuai password database
$db   = "perpus_uniba";

// Koneksi ke MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
