<?php
require('../connected/db.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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
            <h2 class="fas fa-poll-h"> Result</h2>
            <hr>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Penyakit</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <?php
                $query = "select * from konsultasi";
                $execute = mysqli_query($conn, $query);
                if (mysqli_num_rows($execute) > 0) {
                    $I = 1;
                    while ($row = mysqli_fetch_array($execute)) {
                        $username = $row['Username'];
                        $name = $row['Namapasien'];
                        $email = $row['Email'];
                        $jkel = $row['Jeniskelamin'];
                        $dob = $row['Tgllahir'];
                        $idpenyakit = $row['Idpenyakit'];
                        $nilai = $row['Nilai_diagnosa'];

                ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $I; ?></th>
                                <td><?= $name; ?></td>
                                <td><?= $email; ?></td>
                                <td><?= $jkel; ?></td>
                                <td><?= $dob; ?></td>
                                <td><?= $idpenyakit; ?></td>
                                <td><?= $nilai; ?></td>

                            </tr>
                        <?php
                        $I++;
                    }
                        ?>
                    <?php } else {
                    echo "<center>Data Anggota Tidak Ada.</center>";
                }
                    ?>
            </table>

        </div>
        <script src="../assets/jquery/jquery-3.2.1.slim.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="..//assets/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
</body>

</html>