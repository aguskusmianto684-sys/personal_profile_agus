<?php
include '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $name = escapeString(text: $_POST['name']);
    $born = escapeString(text: $_POST['born']);
    $address = escapeString(text: $_POST['address']);
    $zip_code = escapeString(text: $_POST['zip_code']);
    $email = escapeString(text: $_POST['email']);
    $phone = escapeString(text: $_POST['phone']);
    $total_project = escapeString(text: $_POST['total_project']);
    $work = escapeString(text: $_POST['work']);
    $description = escapeString($_POST['description']);

    $imageNew = $about->image;
    $storages = "../../../storages/about/";

    //cek apakah user mengupload gambar baru
    if (!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew = time() . ".png";

        // hapua gambar lama jika ada
        if (!empty($about->image) && file_exists($storages . $about->image)) {
            unlink($storages . $about->image);
        }

        // simpan gambar baru
        move_uploaded_file($imageOld, $storages . $imageNew);
    }

    // uppdate data sesuai id
    $qUpdate = "UPDATE abouts SET name='$name', born='$born',
     address='$address', zip_code='$zip_code', email='$email', phone='$phone',
      total_project='$total_project', work='$work', description='$description', image='$imageNew' WHERE
       id='$id'";

    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        echo "
        <script>
        alert('Data berhasil diubah');
         window.location.href = '../../pages/about/index.php';
         </script>
         ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
         window.location.href = '../../pages/about/edit.php';
         </script>
         ";
    }
}
