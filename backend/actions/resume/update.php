<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $date = escapeString($_POST['date']);
    $job = escapeString($_POST['job']);
    $place = escapeString($_POST['place']);
    $sumary = escapeString($_POST['sumary']);
    $description = escapeString($_POST['description']);

    $id = $resume->id;
    $qUpdate = "UPDATE resumes SET date='$date', job='$job', place='$place', sumary='$sumary', description='$description' WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "<script>alert('Data berhasil diubah'); window.location.href = '../../pages/resume/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href = '../../pages/resume/edit.php?id=$id';</script>";
    }
}
