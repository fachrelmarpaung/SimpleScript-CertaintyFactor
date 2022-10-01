<?php
session_start();
require('../connected/db.php');
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
            <h2 class="fas fa-book"> Tambah Users</h2>
            <hr>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="jkel">Jenis Kelamin</label>
                    <select class="form-control" name="jkel" id="jkel">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dob">Tanggal Lahir</label>
                    <input type="date" name="dob" class="form-control" id="dob">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $jkel = $_POST['jkel'];
                $dob = $_POST['dob'];
                $alamat = $_POST['alamat'];
                $sql = "INSERT INTO users (Email, Username, Passwd, Jkel, tgl_lahir, alamat) VALUES ('$email', '$username', '$password', ' $jkel', '$dob', '$alamat')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Soal Berhasil di Input!')</script>";
                    echo "<script>window.location.href = 'users.php';</script>";
                } else {
                    echo "<script>alert('Soal Gagal di Input!')</script>";
                }
            }
            ?>
        </div>
        <script src="../assets/jquery/jquery-3.2.1.slim.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="..//assets/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
</body>

</html>