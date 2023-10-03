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
    <div class="container card" method="POST">
        <img src="assets/img/CU.jpeg" class="card-img-top" alt="..." height="300">
        <br>
        <p class="MsoNormal" style="line-height: normal; margin: 0cm -16.5pt 0.0001pt 0cm; text-align: center;">
            <span style="font-size: 20pt; color: #2b3e50;">
                <strong>MANAGEMEN USER</strong>
            </span>
        </p>
        <br>
        <style>
            .btn-hapus {
                background-color: #CA4430;
                /* Green */
                border: none;
                color: white;
                padding: 5px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 2px 2px;
                cursor: pointer;
            }
        </style>
        <table class="table table-striped table-bordered" border="1">
            <thead bgcolor="#26d1cb">
                <tr>
                    <th>ID Admin</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($db, "SELECT * FROM user");
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>"."<strong>BNV-" . $row['id'] ."</stong>" . "</td>";
                        echo "<td>"."<strong>" . $row['username'] ."</stong>" . "</td>";
                        echo "<input value=" . $row['id'] . " hidden='hidden'>";
                        echo "<td> " . "
                            <a class='btn btn-hapus  mx-auto'  type='button' href = 'hapusAdmin.php?id=" . $row['id'] . "'><i class='fa-solid fa-trash'></i> Hapus </a></td>";
                        echo "</tr>";
                    }
                }
                mysqli_close($db);
                ?>
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary me-md-2" type="button" href="formTambahAdmin.php">Tambah Admin</a>
        </div>
        <br>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>