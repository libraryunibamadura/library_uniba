<?php
session_start();
include "config.php";

if (!isset($_SESSION['user'])) {
    die("Anda harus login terlebih dahulu.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];

    // Cek folder uploads
    $targetDir = "../uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Nama file unik
    $fileName = time() . "_" . basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO skripsi (judul, nama, prodi, file) 
                VALUES ('$judul', '$nama', '$prodi', '$fileName')";
        if ($conn->query($sql) === TRUE) {
            echo "Skripsi berhasil diupload!";
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo "Gagal mengupload file.";
    }
}
?>
