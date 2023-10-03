<?php
include 'konektor.php';
// menyimpan data kedalam variabel
$id       = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

echo $id, $username, $password;
// query SQL untuk insert data
mysqli_query($db, "UPDATE user SET username='$username', password='$password' WHERE id=$id");
// mengalihkan ke halaman index.php

header("location:berandaAdmin.php");
echo "<script>alert('Profil di edit')</script>";
?>

