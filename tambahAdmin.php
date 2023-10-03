<?php
include 'konektor.php';


$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$sql = "INSERT INTO user VALUES ('$id','$username','$password')";

if (mysqli_query($db, $sql)) {
    header("Location: manajemenAdmin.php");
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($db);
}


// Close connection
mysqli_close($db);