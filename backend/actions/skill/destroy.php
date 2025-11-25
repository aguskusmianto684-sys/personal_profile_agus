<?php
include '../../app.php';
include './show.php';

// Validasi data skill
if (!isset($skill) || !$skill) {
    echo "<script>alert('Data tidak ditemukan');window.location.href='../../pages/skill/index.php';</script>";
    exit;
}

// Hapus data skill
$qDelete = "DELETE FROM skills WHERE id='$skill->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

if($result) {
    echo "<script>
    alert('Data berhasil dihapus');
    window.location.href = '../../pages/skill/index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    window.location.href = '../../pages/skill/index.php';
    </script>";
}
?>