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
        <h5 class="card-header">SURVEY KEPUASAN ANGGOTA</h5>
        <div class="card-body">
            <form method="POST" action="inputkuesioner.php">
                <div class="input-group">
                    <span class="input-group-text">Nama Anggota&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_Anggota" placeholder="Masukkan Nama Anda" name="nama" value="" required>
                    </div>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-text">Tempat Pelayanan&nbsp</span>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="TP" placeholder="Masukkan Tempat Pelayanan" name="TP" value="" required>
                    </div>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-text">Jenis Pelayanan&nbsp&nbsp&nbsp&nbsp</span>
                    <div class="col-sm-5">
                        <select class="form-select form-select-sm-3" aria-label=".form-select-sm" name="pelayanan">
                            <option selected>Pilih Jenis Pelayanan</option>
                            <option value="Teller">Teller</option>
                            <option value="Pelayanan Pinjaman">Pelayanan Pinjaman</option>
                            <option value="Member Service">Member Service</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-text">Tanggal&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo date("Y-m-d"); ?>" disabled>
                        </div>
                    </div>
                </div>
                <div>
                    <td width="97%" valign="top" align="center" colspan="5" style="border-style: none; border-width: medium">
                        <font size="1">
                            <b>
                                <br>
                                "Mohon kesediaan Anda untuk memberikan penilaian dan masukan kepada CU Bonaventura, dimana hal ini
                                sangat bermanfaat untuk meningkatkan kualitas layanan kami."
                                <br>
                            </b>
                            <i>
                                "Silahkan diisi dengan mengklik salah satu button serta keterangan sesuai dengan penilaian Anda pada kolom yang telah disediakan."
                            </i>
                        </font>
                    </td>
                    </tr>
                </div>
                <br>


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
                                        <input class="form-check-input" type="radio" name="kepuasan" id="kepuasan" value="Tidak Puas">
                                        <label class="form-check-label" for="kepuasan"><strong>Tidak Puas</strong></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kepuasan" id="kepuasan" value="Puas">
                                        <label class="form-check-label" for="kepuasan"><strong>Puas</strong></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kepuasan" id="kepuasan" value="Sangat Puas">
                                        <label class="form-check-label" for="kepuasan"><strong>Sangat Puas</strong></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tr>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="" id="saran" name="saran" style="height: 100px"></textarea>
                    <label for="saran">Tuliskan kritik dan saran anda disini....</label>
                </div>
                <button type="submit" class="btn submit mt-3 mb-2">Submit</button>
            </form>

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