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
        <br>
        <p class="MsoNormal" style="line-height: normal; margin: 0cm -16.5pt 0.0001pt 0cm; text-align: center;">
            <span style="font-size: 20pt; color: #2b3e50;">
                <strong>MANAJEMEN ADMIN</strong>
            </span>
        </p>
        <br>
        <div class="card text-center">
            <div class="card-header">
                <strong>Tambah Admin</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="tambahAdmin.php">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="username" aria-label="username" name="username" aria-describedby="addon-wrapping" required>
                    </div>
                    <br>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-key"></i></span>
                        <input type="text" class="form-control" placeholder="password" name="password" aria-label="password" aria-describedby="addon-wrapping" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        <br>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>