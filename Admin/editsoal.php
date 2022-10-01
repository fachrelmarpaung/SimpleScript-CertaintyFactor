<?php
session_start();
require('../connected/db.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_GET['Soalid'])) {
    $id = $_GET['Soalid'];
    $update = mysqli_query($conn, "SELECT * FROM soal WHERE Soalid='$id'");
    if (mysqli_num_rows($update) > 0) {
        while ($row = mysqli_fetch_array($update)) {
            $id = $row['Soalid'];
            $soal = $row['Soal'];
            $nilai_h1 = $row['Nilai_H1'];
            $nilai_h2 = $row['Nilai_H2'];
            $moderate = $row['Moderate'];
            $major = $row['Major'];
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
                        <h2 class="fas fa-book"> Input Soal</h2>
                        <hr>
                        <form method="POST">
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <textarea class="form-control" id="soal" name="soal" rows="3"><?= $soal; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai Moderate</label>
                                <input type="text" class="form-control" id="nilai_h1" name="nilai_h1" value="<?= $nilai_h1; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai Major</label>
                                <input type="text" class="form-control" id="nilai_h2" name="nilai_h2" value="<?= $nilai_h2; ?>">
                            </div>
                            <label for="nilai">Kategori</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="moderate" <?php if ($moderate == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>> <span class="ml-2">Moderate</span>
                                    </div>
                                    <div class="ml-2 input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="major" <?php if ($major == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <span class="ml-2">Major</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?php
                            if (isset($_POST['submit'])) {
                                $soal = $_POST['soal'];
                                $nilai_h1 = $_POST['nilai_h1'];
                                $nilai_h2 = $_POST['nilai_h2'];
                                @$moderate = $_POST['moderate'];
                                $major = @$_POST['major'];
                                $sql = "UPDATE soal SET Soal='$soal',Nilai_H1='$nilai_h1',Nilai_H2='$nilai_h2',Moderate='$moderate',Major='$major' WHERE Soalid = '$id';";
                                $execute = mysqli_query($conn, $sql);
                                if ($execute) {
                                    echo "<script>alert('Data Berhasil Di Tambah.');</script>";
                                    // echo "<script>window.location.href = 'penyakit.php?kategori=" . strtolower($kategorinew) . "';</script>";
                                }
                            } ?>
                    </div>
                    <script src="../assets/jquery/jquery-3.2.1.slim.min.js"></script>
                    <script src="../assets/js/popper.js"></script>
                    <script src="..//assets/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
        <?php }
    }
} ?>
            </body>

            </html>