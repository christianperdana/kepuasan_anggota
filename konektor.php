<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "datasurvey";

$db = mysqli_connect($server, $user, $pass, $database);

if (!$db) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
