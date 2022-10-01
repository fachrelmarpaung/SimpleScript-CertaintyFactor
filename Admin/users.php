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
            <h2 class="fas fa-users"> Users</h2>
            <hr>
            <div class="d-flex flex-row-reverse">
                <a href="tambahusers.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select * from users";
                    $execute = mysqli_query($conn, $query);
                    if (mysqli_num_rows($execute) > 0) {
                        $I = 1;
                        while ($row = mysqli_fetch_array($execute)) {
                            $id = $row['Id'];
                            $email = $row['Email'];
                            $username = $row['Username'];
                            $jkel = $row['Jkel'];
                            $tgl_lahir = $row['tgl_lahir'];
                            $alamat = $row['alamat'];

                    ?>
                            <tr>
                                <th scope="row"><?= $I; ?></th>
                                <td><?= $email; ?></td>
                                <td><?= $username; ?></td>
                                <td><?= $jkel; ?></td>
                                <td><?= $tgl_lahir; ?></td>
                                <td><?= $alamat; ?></td>
                                <td><a href="editusers.php?id=<?= $id; ?>" class="badge badge-primary" style="font-size: 1em;"><i class="fas fa-paste"></i></a><a href="delete.php?type=users&userid=<?= $id; ?>" class="ml-3 badge badge-danger" style="font-size: 1em;"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php
                            $I++;
                        }
                        ?>
            </table>
        <?php }
        ?>
        </div>
        <script src="../assets/jquery/jquery-3.2.1.slim.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="..//assets/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
</body>

</html>