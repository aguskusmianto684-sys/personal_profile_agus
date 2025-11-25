<?php
session_start();
include '../../app.php'; //koneksi database

// cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);

    // cek apakah email dan password sesuai
    $qLogin = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connect, $qLogin) or die(mysqli_error($connect));

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin_logged_in'] = true;
        header('Location:../../pages/dashboard/index.php');
        exit();
    } else {
        echo "<script>
                alert('Email atau Password Salah!');
                window.location.href='../../pages/user/login.php';
            </script>";
    }
}
