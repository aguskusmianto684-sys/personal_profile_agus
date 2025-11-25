<?php
include '../../app.php';
include './show.php';

// Validasi data resume
if (!isset($resume) || !$resume) {
    echo "<script>alert('Data tidak ditemukan');window.location.href='../../pages/resume/index.php';</script>";
    exit;
}

// Hapus data resume
$qDelete = "DELETE FROM resumes WHERE id='$resume->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

if($result) {
    echo "<script>
    alert('Data berhasil dihapus');
    window.location.href = '../../pages/resume/index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    window.location.href = '../../pages/resume/index.php';
    </script>";
}
?>