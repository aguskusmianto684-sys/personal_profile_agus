<?php
include '../../app.php';
if(!isset($_GET['id'])){
    echo "<script>alert('Tidak Bisa memilih ID ini'); window.location.href = '../../pages/resume/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM resumes WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$resume = $result->fetch_object();
if(!$resume){
    echo "<script>alert('Data tidak ditemukan'); window.location.href = '../../pages/resume/index.php';</script>";
    exit;
}
?>