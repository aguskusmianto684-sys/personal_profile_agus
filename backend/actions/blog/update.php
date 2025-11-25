<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])){
    $title = escapeString($_POST['title']);
    $date = escapeString($_POST['date']);
    $author = escapeString($_POST['author']);
    $description = escapeString($_POST['description']);

    $imageNew = $blog->image;
    $storages = "../../../storages/blog/";
    $storagesOld = "../../../storages/blogs/";

    // cek apakah user mengupload gambar baru
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";

        // hapus gambar lama jika ada di blog/ dan blogs/
        if (!empty($blog->image)) {
            if (file_exists($storages . $blog->image)) {
                unlink($storages . $blog->image);
            }
            if (file_exists($storagesOld . $blog->image)) {
                unlink($storagesOld . $blog->image);
            }
        }

        // simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    // update data sesuai id
    $qUpdate = "UPDATE blogs SET title='$title', date='$date', author='$author', description='$description', image='$imageNew' WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "<script>alert('Data berhasil diubah'); window.location.href = '../../pages/blog/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href = '../../pages/blog/edit.php?id=$id';</script>";
    }
}
?>