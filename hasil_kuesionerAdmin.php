<?php
include 'konektor.php';
include 'limit_ses.php';

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
    <script src="://cdn.jsdehttpslivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Survey Kepuasan Anggota</title>
</head>
<style>
            #myInput {
            background-image: url('https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/search-20.png');
            background-position: 10px 13px;
            background-repeat: no-repeat;
            width: 25%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #aaa;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 70%;
        }
</style>
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
            <a class="navbar-brand" href="./berandaAdmin.php">
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

            <div class="item"><a href="berandaAdmin.php"><i class="fas fa-home"></i>Dashboard</a></div>
            <div class="item"><a href="./formEditAkun.php"><i class="fas fa-user"></i>Manajemen Akun</a></div>
            <div class="item"><a href="./hasil_kuesionerAdmin.php"><i class="fas fa-external-link"></i>Hasil Survey</a></div>
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
                <strong>HASIL SURVEY</strong>
            </span>
        </p>
        <div style="width: 400px;margin: 0px auto;">
            <canvas id="myChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Tidak Puas", "Puas", "Sangat Puas"],
                    datasets: [{
                        label: '',
                        data: [
                            <?php
                            $TidakPuas = mysqli_query($db, "select * from survey where kepuasan='Tidak Puas'");
                            echo mysqli_num_rows($TidakPuas);
                            ?>,
                            <?php
                            $Puas = mysqli_query($db, "select * from survey where kepuasan='Puas'");
                            echo mysqli_num_rows($Puas);
                            ?>,
                            <?php
                            $SangatPuas = mysqli_query($db, "select * from survey where kepuasan='Sangat Puas'");
                            echo mysqli_num_rows($SangatPuas);
                            ?>
                        ],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                },
            });
        </script>
        <br>
        <br>
        <p class="MsoNormal" style="line-height: normal; margin: 0cm -16.5pt 0.0001pt 0cm; text-align: center;">
            <span style="font-size: 20pt; color: #2b3e50;">
                <strong>TABEL SURVEY</strong>
            </span>
        </p>
        <br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari..." title="Type in a name">
        <table class="table table-striped table-bordered" border="1" id="myTable">
            <thead bgcolor="#26d1cb">
                <tr>
                    <th>Nama Anggota<a> <i class='fa fa-sort-alpha-asc' aria-hidden='true' onclick='sortTable(0)'></i></a></th>
                    <th>TP<a> <i class='fa fa-sort-alpha-asc' aria-hidden='true' onclick='sortTable(1)'></i></a></th>
                    <th>Pelayanan<a> <i class='fa fa-sort-alpha-asc' aria-hidden='true' onclick='sortTable(2)'></i></a></th>
                    <th>Tanggal<a> <i class='fa fa-sort-alpha-asc' aria-hidden='true' onclick='sortTable(3)'></i></a></th>
                    <th>Tingkat Kepuasan<a> <i class='fa fa-sort-alpha-asc' aria-hidden='true' onclick='sortTable(4)'></i></a></th>
                    <th>Saran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($db, "SELECT * FROM survey");
                $num = mysqli_num_rows($result);
                if ($num > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . "<strong>" . $row['nama'] . "</stong>" . "</td>";
                        echo "<td>" . "<strong>" . $row['TP'] . "</stong>" . "</td>";
                        echo "<td>" . "<strong>" . $row['pelayanan'] . "</stong>" . "</td>";
                        echo "<td>" . "<strong>" . $row['tanggal'] . "</stong>" . "</td>";
                        echo "<td>" . "<strong>" . $row['kepuasan'] . "</stong>" . "</td>";
                        echo "<td>" . "<strong>" . $row['saran'] . "</stong>" . "</td>";
                        echo "</tr>";
                    }
                }
                mysqli_close($db);
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <script>
         function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc";
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /*check if the two rows should switch place,
                    based on the direction, asc or desc:*/
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    //Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /*If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again.*/
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

         function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>