<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/about/";

// hapus gambar lama jika ada
if(!empty($about->image) && file_exists($storages . $about->image)) {
    unlink(($storages . $about->image));
}

// hapus data
$qDelete = "DELETE FROM abouts WHERE id='$about->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil dihapus atau tidak
if($result) {
    echo "<script>
    alert('Data berhasil dihapus');
    \n window.location.href = '../../pages/about/index.php';
    \n </script>\n 
    ";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    \n window.location.href = '../../pages/about/index.php';
    \n </script>\n 
    ";
}
?>