<?php

include 'limit_ses.php';
include 'konektor.php';

if (!isset($_SESSION['username'])) {
    header("Location: berandaUser.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/styleadmin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <title>Survey Kepuasan Anggota</title>
</head>

<body>
    <!-- Modal logout -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">LOGOUT</h5>
                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda akan Logout?
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</a>
                        <a type="button" class="btn btn-danger" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal logout -->

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./berandaSuperAdmin.php">
                <img src="assets/img/CU Bona2.png" alt="" width="50" height="30" class="d-inline-block align-text-top">
                <strong>E-SURVEY CU BONAVENTURA</strong>
            </a>
        </div>
    </nav>
    <!-- awal sidebar -->
    <div class="menu-btn">
        <i class="fas fa-bars"></i>
    </div>
    <div class="side-bar fixed-top">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="menu">

            <h2 class="text-white text-center"><?php echo "" . $_SESSION['username']  . ""; ?></h2>

            <div class="item"><a href="berandaSuperAdmin.php"><i class="fas fa-home"></i>Dashboard</a></div>
            <div class="item"><a href="./manajemenAdmin.php"><i class="fas fa-user"></i>Manajemen Admin</a></div>
            <div class="item"><a href="./hasil_kuesionerSuperAdmin.php"><i class="fas fa-external-link"></i>Hasil Survey</a></div>
            <div class="item"><a data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-sign-out"></i>Log Out</a></div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //jquery for toggle sub menus
            $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
            });

            //jquery for expand and collapse the sidebar
            $('.menu-btn').click(function() {
                $('.side-bar').addClass('active');
                $('.menu-btn').css("visibility", "hidden");
            });

            $('.close-btn').click(function() {
                $('.side-bar').removeClass('active');
                $('.menu-btn').css("visibility", "visible");
            });
        });
    </script>

    <!-- akhir sidebar -->
    <div class="container card">
        <img src="assets/img/CU.jpeg" class="card-img-top" alt="..." height="300">
        <h2>Selamat Datang <?php echo $_SESSION['username'] ?></h2>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="isi-post">
                    <p class="MsoNormal" style="line-height: normal; margin: 0cm -16.5pt 0.0001pt 0cm; text-align: center;">
                        <span style="font-size: 20pt; color: #2b3e50;">
                            <strong>REKAP KEPUASAN PELAYANAN</strong>
                        </span>
                    </p>
                    <hr>
                    <p>&nbsp;</p>
                    <tr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <img src="assets/img/TidakPuas.png" alt="Picture" width="150" height="150">
                                    </th>
                                    <th scope="col">
                                        <img src="assets/img/Puas.png" alt="..." width="150" height="150">
                                    </th>
                                    <th scope="col">
                                        <img src="assets/img/SangatPuas.png" alt="..." width="150" height="150">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <strong>Tidak Puas</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <strong>Puas</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <strong>Sangat Puas</strong>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $server = "localhost";
                                    $user = "root";
                                    $pass = "";
                                    $database = "datasurvey";
                                    $dbh = new mysqli($server, $user, $pass, $database);
                                    foreach($dbh->query('SELECT kepuasan,COUNT(*)
                                    FROM survey WHERE kepuasan="Tidak Puas";') as $row) {
                                        echo "<td>" . $row['COUNT(*)'] . "</td>";
                                    }
                                    foreach($dbh->query('SELECT kepuasan,COUNT(*)
                                    FROM survey WHERE kepuasan="Puas";') as $row) {
                                        echo "<td>" . $row['COUNT(*)'] . "</td>";
                                    }
                                    foreach($dbh->query('SELECT kepuasan,COUNT(*)
                                    FROM survey WHERE kepuasan="Sangat Puas";') as $row) {
                                        echo "<td>" . $row['COUNT(*)'] . "</td>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </tr>
                </div>

                <div class="container">

                    <span style="font-size: 36pt;">
                        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>