<?php
require('../connected/db.php');
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Tes Depresi</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap-4.5.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<!-- Header -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="../">
            PSIKOLOG ONLINE
        </a>
    </div>
</nav>

<body>

    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- @ Start login box wrapper -->
            <div class="blmd-wrapp">
                <div class="blmd-color-conatiner ripple-effect-All"></div>
                <div class="blmd-header-wrapp ">
                    <div class="blmd-switches">
                        <button class="btn btn-circle btn-lg btn-blmd ripple-effect btn-success blmd-switch-button">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="#fff" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="blmd-continer">
                    <!-- @ Login form container -->
                    <form method="POST" class="clearfix " id="login-form">
                        <h1>Login Page</h1>
                        <div class="col-md-12">

                            <div class="input-group blmd-form">
                                <div class="blmd-line">
                                    <input type="text" name="username" autocomplete="off" id="username" class="form-control">
                                    <label class="blmd-label">Username</label>
                                </div>
                            </div>
                            <div class="input-group blmd-form">
                                <div class="blmd-line">
                                    <input type="password" name="password" autocomplete="off" id="password" class="form-control">
                                    <label class="blmd-label">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" name="login" class="btn btn-blmd ripple-effect btn-success btn-lg btn-block">Login</button>
                        </div>
                        <br />
                    </form>
                    <?php
                    if (isset($_POST['login'])) {
                        $username1 = $_POST['username'];
                        $password1 = $_POST['password'];

                        $sql = "SELECT * FROM users WHERE Username='$username1' AND Passwd ='$password1'";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['email'] = $row['Email'];
                            $_SESSION['Namapasien'] = $row['Namapasien'];
                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['dob'] = $row['tgl_lahir'];
                            $_SESSION['jkel'] = $row['Jkel'];
                            $_SESSION['alamat'] = $row['alamat'];
                            $_SESSION['arrdash'] = array();
                            $_SESSION['arrdash'][0]['Namapasien'] = $_SESSION['Namapasien'];
                            $_SESSION['arrdash'][0]['username'] = $_SESSION['username'];
                            $_SESSION['arrdash'][0]['email'] = $_SESSION['email'];
                            $_SESSION['arrdash'][0]['jkel'] = $_SESSION['jkel'];
                            $_SESSION['arrdash'][0]['dob'] = $_SESSION['dob'];
                            $_SESSION['arrdash'][0]['alamat'] = $_SESSION['alamat'];
                            header("Location: soal.php");
                        } else {
                            echo "<script>alert('Username atau Password Anda salah!')</script>";
                        }
                    }
                    ?>
                    <!-- @ Login form container -->
                    <form method="POST" class="clearfix form-hidden" id="Register-form">
                        <h1>Register Page</h1>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="email">Nama Lengkap</label>
                                <input type="text" name="namalengkap" class="form-control" id="namalengkap" aria-describedby="emailHelp" placeholder="Enter your full name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" name="newusername" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="newpassword" class="form-control" id="password" placeholder="Password">
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
                                <button type="submit" name="regiter" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <br />
                    </form>
                    <?php
                    if (isset($_POST['regiter'])) {
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['Namapasien'] = $_POST['namalengkap'];
                        $password2 = $_POST['newpassword'];
                        $_SESSION['username'] = $_POST['newusername'];
                        $_SESSION['jkel'] = $_POST['jkel'];
                        $_SESSION['dob'] = $_POST['dob'];
                        $_SESSION['alamat'] = $_POST['alamat'];

                        $alamat = $_POST['alamat'];
                        $sql = "INSERT INTO users (Email, Username, Namapasien, Passwd, Jkel, tgl_lahir, alamat) VALUES ('{$_SESSION['email']}', '{$_SESSION['username']}', '{$_SESSION['Namapasien']}', '$password2', '{$_SESSION['jkel']}', '{$_SESSION['dob']}', '{$_SESSION['alamat']}')";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Terima kasih telah mendaftar, Silahkan melakukan tes depresi!')</script>";
                            echo "<script>window.location.href = 'soal.php';</script>";
                        } else {
                            echo "<script>alert('Soal Gagal di Input!')</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/ujian.js"></script>
    <!-- Footer -->
    <footer class="footer bg-light p-3">
        Copyright@FachrelMarpaung
    </footer>
</body>

</html>