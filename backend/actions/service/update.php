<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $icon = escapeString($_POST['icon']);
    $job = escapeString($_POST['job']);
    $id = $service->id;

    $qUpdate = "UPDATE services SET icon='$icon', job='$job' WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "<script>alert('Data berhasil diubah'); window.location.href = '../../pages/service/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href = '../../pages/service/edit.php?id=$id';</script>";
    }
}
?>