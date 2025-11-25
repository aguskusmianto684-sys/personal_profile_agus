<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $icon = escapeString($_POST['icon']);
    $link = escapeString($_POST['link']);
    $id = $socmed->id;

    $qUpdate = "UPDATE socmeds SET icon='$icon', link='$link' WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "<script>alert('Data berhasil diubah'); window.location.href = '../../pages/socmed/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href = '../../pages/socmed/edit.php?id=$id';</script>";
    }
}
?>