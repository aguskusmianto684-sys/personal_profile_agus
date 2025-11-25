<?php
include '../../app.php';
if(!isset($_GET['id'])){
    echo "<script>alert('Tidak Bisa memilih ID ini'); window.location.href = '../../pages/contact/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM contacts WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$contact = $result->fetch_object();
if(!$contact){
    echo "<script>alert('Data tidak ditemukan'); window.location.href = '../../pages/contact/index.php';</script>";
    exit;
}
?>