<?php
require("../connected/db.php");
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Username atau Password Anda salah!')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap-4.5.3-dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">

    <!-- MY Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- mycss -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Admin Panel</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg  bg-light">
        <div class="container">
            <a class="navbar-brand" href="../">
                PSIKOLOG ONLINE
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center min-width">
            <form class="position-relative login-form mt-5" method="POST">
                <div class="mb-3 position-center text-center">
                    <i class="fa-lg fas fa-user-md fa-7x"></i><br>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label mx-width-50">Username</label>
                    <input type="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="text-right">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <?php
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo $username;
        }
        ?>
    </div>

</body>

</html>