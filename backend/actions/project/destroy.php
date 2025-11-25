<?php
include '../../app.php';
include './show.php';

$storages = "../../../storages/project/";
// hapus gambar lama jika ada
if(!empty($project->image) && file_exists($storages . $project->image)) {
    unlink($storages . $project->image);
}

// hapus data
$qDelete = "DELETE FROM projects WHERE id='$project->id'";
$result = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

// cek apakah data berhasil dihapus atau tidak
if($result) {
    echo "<script>\n    alert('Data berhasil dihapus');\n    window.location.href = '../../pages/project/index.php';\n    </script>\n";
} else {
    echo "<script>\n    alert('Data gagal dihapus');\n    window.location.href = '../../pages/project/index.php';\n    </script>\n";
}
?>