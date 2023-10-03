<?php
include 'konektor.php';

$id = $_GET['id'];
mysqli_query($db, "DELETE FROM user WHERE id='$id'");

header("location:manajemenAdmin.php");

// Close connection
mysqli_close($db);