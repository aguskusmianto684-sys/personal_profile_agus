<?php
include '../../app.php';
include './show.php';


$storages = "../../../storages/blog/";
$storagesOld = "../../../storages/blogs/";

// hapus gambar lama jika ada (di blog/ dan blogs/)
if(!empty($blog->image)) {
    if(file_exists($storages . $blog->image)) {
        unlink($storages . $blog->image);
    }
    if(file_exists($storagesOld . $blog->image)) {
        unlink($storagesOld . $blog->image);
    }
}

// hapus data
$qDelete = "DELETE FROM blogs WHERE id='$blog->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil dihapus atau tidak
if($result) {
    echo "<script>\n    alert('Data berhasil dihapus');\n    window.location.href = '../../pages/blog/index.php';\n    </script>\n";
} else {
    echo "<script>\n    alert('Data gagal dihapus');\n    window.location.href = '../../pages/blog/index.php';\n    </script>\n";
}
?>