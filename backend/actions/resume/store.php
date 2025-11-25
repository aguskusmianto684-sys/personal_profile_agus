<?php
// Aktifkan error reporting di paling atas file
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../app.php';

// Pastikan form disubmit dengan name="tombol"
if (isset($_POST['tombol'])) {
    // Debug: cek data yang diterima
    // print_r($_POST); exit(); // Uncomment untuk debugging
    
    // Pastikan semua field ada
    if (!isset($_POST['date']) || !isset($_POST['job']) || !isset($_POST['place']) || !isset($_POST['description'])) {
        die("<script>alert('Data tidak lengkap'); window.location.href='../../pages/resume/create.php';</script>");
    }

    $date = escapeString($_POST['date']);
    $job = escapeString($_POST['job']);
    $place = escapeString($_POST['place']);
    $sumary = escapeString($_POST['sumary']);
    $description = escapeString($_POST['description']);

    // Validasi data tidak kosong
    if (empty($date) || empty($job) || empty($place) || empty($sumary) || empty($description)) {
        die("<script>alert('Semua field harus diisi'); window.location.href='../../pages/resume/create.php';</script>");
    }

    $qInsert = "INSERT INTO resumes(date, job, place, sumary, description) VALUES('$date', '$job', '$place', '$sumary', '$description')";
    
    // Eksekusi query
    $result = mysqli_query($connect, $qInsert);

    if ($result) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            window.location.href = '../../pages/resume/index.php';
        </script>";
    } else {
        // Tambahkan error message dari MySQL
        $error = mysqli_error($connect);
        echo "<script>
            alert('Gagal: " . addslashes($error) . "');
            window.location.href = '../../pages/resume/create.php';
        </script>";
    }
    exit();
} else {
    // Jika akses langsung ke file action
    header("Location: ../../pages/resume/create.php");
    exit();
}
?>