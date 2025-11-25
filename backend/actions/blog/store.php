<?php
include '../../app.php';

if (isset($_POST['tombol'])){
    $title = escapeString($_POST['title']);
    $date = escapeString($_POST['date']);
    $author = escapeString($_POST['author']);
    $description = escapeString($_POST['description']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    // Validasi format tanggal (YYYY-MM-DD)
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        echo "<script>alert('Format tanggal tidak valid! Gunakan YYYY-MM-DD'); window.location.href = '../../pages/blog/create.php';</script>";
        exit;
    }

    $storages = "../../../storages/blog/";
    if(move_uploaded_file($imageOld, $storages . $imageNew)){
        $qInsert = "INSERT INTO blogs(title, date, author, description, image) VALUES('$title', '$date', '$author', '$description', '$imageNew')";
        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo "<script>alert('Data berhasil ditambahkan');
        \n window.location.href = '../../pages/blog/index.php';
        \n </script>\n ";
    }else{
        echo "\n        <script>alert('Data gagal ditambah');
        \n         window.location.href = '../../pages/blog/create.php';
        \n         </script>\n         ";
    }
}
?>