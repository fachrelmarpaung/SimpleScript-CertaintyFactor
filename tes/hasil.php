<?php
require('../connected/db.php');
session_start();
if (!isset($_SESSION['hasilhitungCF'])) {
    header("Location: soal.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap-5.1.1-dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">

    <!-- mycss -->
    <link rel="stylesheet" href="../assets/css/hasil.css">


    <!-- JSoutsite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/16.12.0/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.11.0/umd/react-dom.production.min.js"></script>

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

    <!-- body -->
    <div class="container pt-3">
        <div class="row">
            <div class="col-8">
                <h1 style="text-align:center">HASIL ANALISA</h1>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p>Berdasarkan hasil yang didapat dari analisa yang telah dilakukan maka hasilnya adalah :
                                Anda mengidap tingkat depresi "<?= $_SESSION['hasil'] ?>" dengan persentase "<?= round($_SESSION['hasilhitungCF'] * 100); ?>%".</p>
                        </div>
                        <h4 class="text-center">"<?= $_SESSION['hasil'] ?>"</h4>
                        <!-- INTROVERT -->
                        <div id="introvert"></div>
                        <script>
                            class ProgressBar extends React.Component {
                                constructor(props) {
                                    super(props);
                                }
                                render() {
                                    return /*#__PURE__*/ (
                                        React.createElement("div", {
                                                className: "container"
                                            }, /*#__PURE__*/
                                            React.createElement("div", {
                                                    className: "progressbar-container"
                                                }, /*#__PURE__*/
                                                React.createElement("div", {
                                                        className: "progressbar-complete",
                                                        style: {
                                                            width: '<?= round($_SESSION['hasilhitungCF'] * 100); ?>%'
                                                        }
                                                    }, /*#__PURE__*/
                                                    React.createElement("div", {
                                                        className: "progressbar-liquid"
                                                    })), /*#__PURE__*/

                                                React.createElement("span", {
                                                    className: "progress"
                                                }, "Persentasi Tingkat Depresi <?= $_SESSION['hasil'] ?> : ", "<?= round($_SESSION['hasilhitungCF'] * 100); ?>", "%"))));
                                }
                            }

                            ReactDOM.render( /*#__PURE__*/ React.createElement(ProgressBar, null), document.getElementById("introvert"));
                        </script>
                        <p class="mt-2">Hal-hal yang harus anda lakukan untuk mengatasi tingkat depresi "<?= $_SESSION['hasil'] ?>" adalah :</p>
                        <?php
                        if ($_SESSION['hasil'] == "Major") {
                            $html='
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Solusi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Psikolog</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Obat Antidepresan</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Terapi Kejut Listrik</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Komplikasi Depresi</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Pencengahan Depresi</td>
                                    </tr>
                                </tbody>
                            </table>';
                            echo $html;
                        } elseif ($_SESSION['hasil'] == "Moderate") {
                        $template='<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Solusi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Psikolog</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Obat Antidepresan</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Terapi Kejut Listrik</td>
                            </tr>
                        </tbody>
                    </table>';
                        echo $html;
                        } else { 
                            $html = '
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Solusi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Psikolog</td>
                                    </tr>
                                </tbody>
                            </table>';
                        echo $html;
                        }
                        ?>
                        <a href="generatepdf.php" rel="noopener noreferrer" class="btn btn-primary">DOWNLOAD HASIL</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <h4 style="text-align:center">BIODATA</h4>

                <center>
                    <?php
                    if($_SESSION['jkel'] == "Perempuan"){
                        ?>
                    <img src="../images/women.png" alt="user" width="200px">
                    <?php
                    }else{
                        ?>
                        <img src="../images/man.png" alt="user" width="200px">
                    <?php
                    }
                    ?>
                </center>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Nama Lengkap</th>
                            <td><?= $_SESSION['username'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Lahir</th>
                            <td><?= $_SESSION['dob'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Kelamin</th>
                            <td><?= $_SESSION['jkel'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Diagnosa</th>
                            <td><?= round($_SESSION['hasilhitungCF'] * 100); ?>% <?= $_SESSION['hasil'] ?> Depression</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-light p-3">
        Copyright@FachrelMarpaung
    </footer>
</body>

</html>