<?php
include '../../app.php';

if (isset($_POST['tombol'])){
    $title = escapeString($_POST['title']);
    $job = escapeString($_POST['job']);
    $category = escapeString($_POST['category']);
    $description = escapeString($_POST['description']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/projects/";
    if(move_uploaded_file($imageOld, $storages . $imageNew)){
        $qInsert = "INSERT INTO projects(title, job, category, description, image) VALUES('$title', '$job', '$category', '$description', '$imageNew')";
        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo "<script>alert('Data berhasil ditambahkan');\n window.location.href = '../../pages/project/index.php';\n </script>\n ";
    }else{
        echo "\n        <script>alert('Data gagal ditambah');\n         window.location.href = '../../pages/project/create.php';\n         </script>\n         ";
    }
}
?>