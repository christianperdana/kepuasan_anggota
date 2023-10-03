<?php
include 'konektor.php';


$nama = $_REQUEST['nama'];
$TP = $_REQUEST['TP'];
$pelayanan = $_REQUEST['pelayanan'];
$tanggal = date('Y-m-d');
$kepuasan = $_REQUEST['kepuasan'];
$saran = $_REQUEST['saran'];

$sql = "INSERT INTO survey VALUES ('$id_user','$nama','$TP','$pelayanan','$tanggal','$kepuasan','$saran')";

if (mysqli_query($db, $sql)) {
    header("Location: sukses.php");
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($db);
}


// Close connection
mysqli_close($db);