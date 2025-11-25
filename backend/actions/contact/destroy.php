<?php
include '../../app.php';

// TAMBAHAN 1: Pastikan ID diterima dari form POST
if (!isset($_POST['id'])) {
    die("<script>
        alert('ID tidak ditemukan di request');
        window.location.href='../../pages/contact/index.php';
    </script>");
}
$id = $_POST['id']; // TAMBAHAN 2: Ambil ID dari form

// TAMBAHAN 3: Validasi koneksi database
if (!$connect) {
    die("<script>
        alert('Koneksi database gagal');
        window.location.href='../../pages/contact/index.php';
    </script>");
}

// (Kode Anda tetap di bawah ini, tidak diubah)
// Cek apakah data dengan ID itu ada
$qSelect = "SELECT * FROM contacts WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$contact = $result->fetch_object();

if (!$contact) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
    exit();
}

// Hapus data contact
$qDelete = "DELETE FROM contacts WHERE id='$contact->id'";
$resultDelete = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

if ($resultDelete) {
    echo "<script>
    alert('Data berhasil dihapus');
    window.location.href = '../../pages/contact/index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    window.location.href = '../../pages/contact/index.php';
    </script>";
}
?>