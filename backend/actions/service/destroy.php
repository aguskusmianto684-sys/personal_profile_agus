<?php
include '../../app.php';
include './show.php';

// Validasi data service
if (!isset($service) || !$service) {
    echo "<script>alert('Data tidak ditemukan');window.location.href='../../pages/service/index.php';</script>";
    exit;
}

// Hapus data service
$qDelete = "DELETE FROM services WHERE id='$service->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

if($result) {
    echo "<script>
    alert('Data berhasil dihapus');
    window.location.href = '../../pages/service/index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    window.location.href = '../../pages/service/index.php';
    </script>";
}
?>