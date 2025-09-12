<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIM   = $_POST['nim'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE nim='$NIM' LIMIT 1");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['nama'];
            header("Location: ../repository.html");
            exit;
        } else {
            echo "Password salah!";
        }
    } else {
        echo "NIM tidak ditemukan!";
    }
}
?>
