<?php
require_once '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $title = escapeString($_POST['title']);
    $job = escapeString($_POST['job']);
    $category = escapeString($_POST['category']);
    $description = escapeString($_POST['description']);
    $imageNew = $project->image;
    $storages = "../../../storages/projects/";

    // cek apakah user mengupload gambar baru
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";

        // hapus gambar lama jika ada
        if (!empty($project->image) && file_exists($storages . $project->image)) {
            unlink($storages . $project->image);
        }

        // simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    // update data sesuai id
    $qUpdate = "UPDATE projects SET title='$title', job='$job', category='$category', description='$description', image='$imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "<script>alert('Data berhasil diubah'); window.location.href = '../../pages/project/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href = '../../pages/project/edit.php?id=$id';</script>";
    }
}
