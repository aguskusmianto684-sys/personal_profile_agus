<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "personal_profile_agus";

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
