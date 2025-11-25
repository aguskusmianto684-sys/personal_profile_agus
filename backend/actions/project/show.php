<?php
require_once '../../app.php';
if (!isset($_GET['id'])) {
    echo "<script>alert('Tidak Bisa memilih ID ini'); window.location.href = '../../pages/project/index.php';</script>";
    exit;
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM projects WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$project = $result->fetch_object();
if (!$project) {
    echo "<script>alert('Data tidak ditemukan'); window.location.href = '../../pages/project/index.php';</script>";
    exit;
}
