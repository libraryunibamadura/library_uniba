<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIM     = $_POST['nim'];
    $email_kampus    = $_POST['email kampus'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Simpan ke database
    $sql = "INSERT INTO users (nim, email kampus, password) VALUES ('$NIM', '$email_kampus', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../login.html?success=1");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
