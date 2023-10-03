<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['datasurvey']);
session_destroy();
header("Location:berandaUser.php");
