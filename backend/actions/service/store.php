<?php
include '../../app.php';

if (isset($_POST['tombol'])){
    $job = escapeString($_POST['job']);
    $icon = escapeString($_POST['icon']);

    $qInsert = "INSERT INTO services(icon, job) VALUES('$icon', '$job')";
    $result = mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = '../../pages/service/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah'); window.location.href = '../../pages/service/create.php';</script>";
    }
}
?>
