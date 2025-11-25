<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $icon = escapeString($_POST['icon']);
    $link = escapeString($_POST['link']);

    $qInsert = "INSERT INTO socmeds(icon, link) VALUES('$icon', '$link')";
    if (mysqli_query($connect, $qInsert)) {
        echo "<script>alert('Data berhasil ditambahkan');\n window.location.href = '../../pages/socmed/index.php';\n </script>\n ";
    } else {
        echo "<script>alert('Data gagal ditambah'); window.location.href = '../../pages/socmed/create.php';</script>";
    }
}
