<?php

include 'konektor.php';
include 'limit_ses.php';

error_reporting(0);


if (isset($_SESSION['username'])) {
    header("Location: berandaSuperAdmin.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $admin);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: berandaAdmin.php");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sadmin = "SELECT * FROM super_admin WHERE username='$username' AND password='$password'";
    $sresult = mysqli_query($db, $sadmin);
    if ($sresult->num_rows > 0) {
        $row = mysqli_fetch_assoc($sresult);
        $_SESSION['username'] = $row['username'];
        header("Location: berandaSuperAdmin.php");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
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
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/style.css">
    <title>Survey Kepuasan Anggota</title>
</head>

<body>
    <div class="alert-warning" role="alert">
        <?php echo $_SESSION['error'] ?>
    </div>
    <!-- Modal Login admin -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-box">
                        <form method="POST" class="login-email">
                            <div class="textbox">
                                <i class="fas fa-user"></i>
                                <input type="username" placeholder="user name" name="username" value="<?php echo $username; ?>" required>
                            </div>
                            <div class="textbox">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
                            </div>
                            <div>
                                <br>
                                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button name="login" class="btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal login admin -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./berandaUser.php">
                <img src="assets/img/CU Bona2.png" alt="" width="50" height="30" class="d-inline-block align-text-top">
                <strong>E-SURVEY CU BONAVENTURA</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-end ms-auto">
                    <li class="nav-item">
                        <button type="button" class="btn my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Login Admin <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container card">
        <img src="assets/img/CU.jpeg" class="card-img-top" alt="..." height="300">
        <br>
        <div class="card text-center">
            <div class="card-header">
                <h5><strong>SUBMIT BERHASIL</strong></h5>
            </div>
            <div class="card-body">
                <h5 class="card-title">Anda Telah Mengisi Survey Ini</h5>
                <p class="card-text">Terimakasih atas waktu dan penilaian yang anda berikan, semua penilaian anda
                                     akan kami terima sebagai sarana untuk meningkatkan kualitas pelayanan kami.</p>
                <a href="berandaUser.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <br>

        <!-- awal footer -->
        <div class="footer mt-2">
            <div class="sosial">
                <a href="https://www.cubonaventura.org" target="_blank"><i class="fa-solid fa-globe"></i></a>
            </div>
            <p class="copyright">
                CU BONAVENTURA @ 2022
            </p>
        </div>

        </footer>
        <!-- akhir footer -->

        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>