<?php
require('../connected/db.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$dxd = 0;
$arrKu = array();
$query = "select * from users";
$query2 = "select * from soal";
$query3 = "select * from konsultasi";
$execute = mysqli_query($conn, $query);
$execute2 = mysqli_query($conn, $query2);
$execute3 = mysqli_query($conn, $query3);
if (mysqli_num_rows($execute) > 0) {
    while ($row = mysqli_fetch_array($execute)) {
        $arrKu[$dxd]["Id"] = $row['Id'];
        $dxd += 1;
    }
}
if (mysqli_num_rows($execute2) > 0) {
    while ($row2 = mysqli_fetch_array($execute2)) {
        $arrKu2[$dxd]["Id"] = $row2['Soalid'];
        $dxd += 1;
    }
}
if (mysqli_num_rows($execute3) > 0) {
    while ($row2 = mysqli_fetch_array($execute3)) {
        $arrKu3[$dxd]["Id"] = $row2['Idpasien'];
        $dxd += 1;
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>DASHBOARD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../assets/jquery/jquery-3.2.1.slim.min.js"></script>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                </button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(../../img/bg.jpg);">
                <div class="user-logo">
                    <i class="fas fa-fa-user-md text-white"></i>
                    <h3>Administrator</h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="dashboard.php"><span class="fas fa-home mr-3"></span> Home</a>
                </li>
                <li>
                    <a href="users.php"><span class="fas fa-users mr-3"></span> Users</a>
                </li>
                <li>
                    <a href="penyakit.php"><span class="fas fas fa-hand-holding-medical mr-3"></span> Gejala</a>
                </li>
                <li>
                    <a href="result.php"><span class="fas fa-poll-h mr-3"></span> Result</a>
                </li>
                <li>
                    <a href="logout.php"><span class="fas fa-sign-out-alt mr-3"></span> Sign Out</a>
                </li>
            </ul>
        </nav>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="fas fa-home"> Dashboard</h2>
            <hr>
            <div class="text-center">
                <div class="row">
                    <!-- Jumlah users -->
                    <div class="card bg-info mb-3 mr-3" style="max-width: 18rem;">
                        <div class="card-body text-left">
                            <div class="bodyicon">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <h3 class="text-white">JUMLAH USERS</h3>
                            <h1 class="text-white"><?= count($arrKu); ?></h1>
                            <a href="users.php" class="card-text text-white">Lihat detail>></a>
                        </div>
                    </div>

                    <!-- Jumlah Gejala -->
                    <div class="card bg-primary mb-3 mr-3" style="max-width: 18rem;">
                        <div class="card-body text-left">
                            <div class="bodyicon">
                                <i class="fas fa-hand-holding-medical text-white"></i>
                            </div>
                            <h3 class="text-white">JUMLAH GEJALA</h3>
                            <h1 class="text-white"><?= count($arrKu2); ?></h1>
                            <a href="users.php" class="card-text text-white">Lihat detail>></a>
                        </div>
                    </div>

                    <!-- Total Pasien -->
                    <div class="card bg-success mb-3 mr-3" style="max-width: 18rem;">
                        <div class="card-body text-left">
                            <div class="bodyicon">
                                <i class="fas fa-hand-holding-medical text-white"></i>
                            </div>
                            <h3 class="text-white">JUMLAH PASIEN</h3>
                            <h1 class="text-white"><?= count($arrKu3); ?></h1>
                            <a href="users.php" class="card-text text-white">Lihat detail>></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/jquery/jquery-3.2.1.slim.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="..//assets/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
</body>

</html>