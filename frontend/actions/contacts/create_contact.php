<?php
include '../../../config/connection.php';
include '../../../config/escapeString.php';

if (isset($_POST['tombol'])) {
    $name = escapeString(text: $_POST['name']);
    $email = escapeString(text: $_POST['email']);
    $subject = escapeString(text: $_POST['subject']);
    $phone = escapeString(text: $_POST['phone']);
    $massage = escapeString(text: $_POST['massage']);


    $qInsert = "INSERT INTO contacts(name, email, subject, phone, massage) VALUES('$name', '$email', '$subject', '$phone', '$massage')";

    if (mysqli_query( $connect,  $qInsert)) {
        echo "
        <script>alert('Data berhasil ditambahkan');
         window.location.href = '../../index.php#contact';
         </script>
         ";
    }else{
        echo "
        <script>alert('Data gagal ditambah'): " . mysqli_error($connect) . "');
         window.location.href = '../../index.php#contact';
         </script>
         ";
    }
}
?>