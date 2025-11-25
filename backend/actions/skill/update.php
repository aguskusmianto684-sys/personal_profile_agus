<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $skillName = escapeString($_POST['skill']);
    $descriptionName = escapeString($_POST['description']);
    $percent = escapeString($_POST['percent']);
    $id = $skill->id;

    $qUpdate = "UPDATE skills SET skill='$skillName', description='$descriptionName', percent='$percent' WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "<script>alert('Data berhasil diubah'); window.location.href = '../../pages/skill/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href = '../../pages/skill/edit.php?id=$id';</script>";
    }
}
?>