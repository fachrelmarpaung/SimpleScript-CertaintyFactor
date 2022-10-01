<?php
session_start();
require('../connected/db.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $update = mysqli_query($conn, "SELECT * FROM users WHERE Id='$id'");
    if (mysqli_num_rows($update) > 0) {
        while ($row = mysqli_fetch_array($update)) {
            $id = $row['Id'];
            $email = $row['Email'];
            $username = $row['Username'];
            $password = $row['Passwd'];
            $jkel = $row['Jkel'];
            $dob = $row['tgl_lahir'];
            $alamat = $row['alamat'];
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
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= $email; ?>" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" name="username" class="form-control" id="username" value="<?= $username; ?>" aria-describedby="emailHelp" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="jkel">Jenis Kelamin</label>
                                <select class="form-control" name="jkel" id="jkel">
                                    <option><?= $jkel; ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dob">Tanggal Lahir</label>
                                <input type="date" name="dob" value="<?= $dob; ?>" class="form-control" id="dob">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $alamat; ?></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $id2 = $_POST['id'];
                            $email2 = $_POST['email'];
                            $username2 = $_POST['username'];
                            $password2 = $_POST['password'];
                            $jkel2 = $_POST['jkel'];
                            $dob2 = $_POST['dob'];
                            $alamat2 = $_POST['alamat'];
                            $sql = "UPDATE users SET Email='$email2',Username='$username2',Passwd='$password2',Jkel='$jkel2',tgl_lahir='$dob2',alamat='$alamat2' WHERE Id = '$id';";
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
        <?php }
    }
} ?>
            </body>

            </html>