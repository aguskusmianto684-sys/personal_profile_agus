<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $skill   = escapeString($_POST['skill']);
    $percent = (int) $_POST['percent'];

    // Kalau form belum ada input description, kita isi default kosong
    $description = '';

    $qInsert = "INSERT INTO skills(skill, percent, description) 
                VALUES('$skill', '$percent', '$description')";

    if (mysqli_query($connect, $qInsert)) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = '../../pages/skill/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambah: " . mysqli_error($connect) . "');
                window.location.href = '../../pages/skill/create.php';
              </script>";
    }
}
?>
