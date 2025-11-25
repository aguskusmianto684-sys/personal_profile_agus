<?php
include '../../app.php';

if (isset($_POST['tombol'])) {
    $name = escapeString(text: $_POST['name']);
    $born = escapeString(text: $_POST['born']);
    $address = escapeString(text: $_POST['address']);
    $zip_code = escapeString(text: $_POST['zip_code']);
    $email = escapeString(text: $_POST['email']);
    $phone = escapeString(text: $_POST['phone']);
    $total_project = escapeString(text: $_POST['total_project']);
    $work = escapeString(text: $_POST['work']);
    $description = escapeString(text: $_POST['description']);

    // Cek file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageExt, $allowedExt)) {
            echo "<script>
                alert('Format gambar tidak didukung! Hanya jpg, jpeg, png, gif yang diizinkan.');
                window.location.href = '../../pages/about/create.php';
            </script>";
            exit;
        }

        // Buat nama file unik
        $imageNewName = time() . '_' . uniqid() . '.' . $imageExt;
        $storage = "../../../storages/about/";

        if (move_uploaded_file($imageTmp, $storage . $imageNewName)) {
            $qInsert = "INSERT INTO abouts (name, born, address, zip_code, email, phone, total_project, work, description, image) 
            VALUES ('$name', '$born', '$address', '$zip_code', '$email', '$phone', '$total_project', '$work', '$description', '$imageNewName')";
            mysqli_query($connect, $qInsert) or die(mysqli_error($connect));

            echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = '../../pages/about/index.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Gagal upload gambar');
                window.location.href = '../../pages/about/create.php';
            </script>";
            exit;
        }
    } else {
        echo "<script>
            alert('Silahkan pilih gambar terlebih dahulu');
            window.location.href = '../../pages/about/create.php';
        </script>";
        exit;
    }
}
