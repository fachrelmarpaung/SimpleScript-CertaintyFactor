<?php
error_reporting(0);
require('../connected/db.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
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
    <link href="../assets/css/style.css" rel="stylesheet">
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
    <!-- Begin page content -->
    
    <main role="main" class="container">
    <h2 class="text-center">KONSULTASI</h2>
    <div class="row">
        <div class="col">
        <table>
        <tr>
            <td>USERNAME</td>
            <td>:</td>
            <td class="text-uppercase"><?= $_SESSION['username'];?></td>
        </tr>
        <tr>
            <td>NAMA LENGKAP</td>
            <td>:</td>
            <td class="text-uppercase"><?= $_SESSION['Namapasien'];?></td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td>:</td>
            <td class="text-uppercase"><?= $_SESSION['email'];?></td>
        </tr>
        <tr>
            <td>TANGGAL LAHIR</td>
            <td>:</td>
            <td class="text-uppercase"><?= $_SESSION['dob'];?></td>
        </tr>
        <tr>
            <td>UMUR</td>
            <td>:</td>
            <td class="text-uppercase"><?php echo (date("Y") - date("Y", strtotime($_SESSION['dob']))); ?></td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td class="text-uppercase"><?= $_SESSION['jkel'];?></td>
        </tr>
    </table>  
        </div>
        <div class="col">
            <p class="p-5">Laporan Diagnosa Penyakit Depresi</p>
        </div>
    </div>
        <form method="POST">
        <div class="text-right">
            <button type="submit" name="submit" class="btn btn-primary" style="padding:10px;">Selesai</button>
        </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Soal</th>
                        <th scope="col">Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dxd = 0;
                    $arrKu = array();
                    $query = "select * from Soal";
                    $execute = mysqli_query($conn, $query);
                    if (mysqli_num_rows($execute) > 0) {

                        $l = 1;
                        while ($row = mysqli_fetch_array($execute)) {

                            $arrKu[$dxd]["id"] = $row['Soalid'];
                            $arrKu[$dxd]["Soal"] = $row['Soal'];
                            $arrKu[$dxd]["moderate"] = $row['Moderate'];
                            $arrKu[$dxd]["major"] = $row['Major'];
                            $arrKu[$dxd]["bobot1"] = $row['Nilai_H1'];
                            $arrKu[$dxd]["bobot2"] = $row['Nilai_H2'];


                    ?>
                            <tr>
                                <th scope="row"><?= $l++; ?></th>
                                <input type="hidden" name="idsoal<?= $arrKu[$dxd]['id'] ?>" value="<?= $arrKu[$dxd]['id'] ?>">
                                <td><?= $arrKu[$dxd]["Soal"]; ?></td>
                                <td>
                                    <select name="nilai<?= $arrKu[$dxd]['id'] ?>" id="">
                                        <option value="0">Tidak</option>
                                        <option value="0.2">Tidak Tahu</option>
                                        <option value="0.4">Sedikit Yakin</option>
                                        <option value="0.6">Cukup Yakin</option>
                                        <option value="0.8">Yakin</option>
                                        <option value="1">Sangat Yakin</option>
                                    </select>
                                </td>
                            </tr>
                        <?php

                            $dxd += 1;
                        }

                        if ($_POST) {
                            $i = 1;
                            $j = 0;
                            while ($i <= count($arrKu)) {
                                // // echo "Tes : $i<br>";
                                $identity = "nilai" . $i;
                                $id = "idsoal" . $i;
                                $arrku2[$i]["idsoal"] = strval($id);
                                $arrku2[$i]["bobot1"] = strval($arrKu[$j]["bobot1"]);
                                $arrku2[$i]["bobot2"] = strval($arrKu[$j]["bobot2"]);
                                $arrku2[$i]["nilai"] = $_POST[$identity];
                                $i++;
                                $j++;
                            }


                            // ------------------------------------------------ Perhitungan dan pembatasan pemilihan ----------------------------------------    
                            $vale = 0;
                            for ($d = 0; $d < count($arrku2); $d++) {
                                if ($arrku2[$d]["nilai"] !== null) {
                                    $vale = $vale + 1;
                                }
                            }

                            // ----------------------------------------------- CF Count ----------------------------------------------------------


                            if ($vale > 2) {

                                $k = 1;
                                $h = 0;
                                while ($k <= count($arrku2)) {
                                    $bobot1 = $arrku2[$k]["bobot1"] * $arrku2[$k]["nilai"];
                                    $bobot2 = (int)$arrku2[$k]["bobot2"] * (int)$arrku2[$k]["nilai"];
                                    $arrtotal[$h]['bobot1'] = strval($bobot1);
                                    $arrtotal[$h]['bobot2'] = strval($bobot2);

                                    $h++;
                                    $k++;
                                }
                                $count = count($arrku2);

                                for ($o = 0; $o < 1; $o++) {
                                    $lol[$o] = $arrtotal[$o]['bobot1'] + $arrtotal[$o + 1]['bobot1'] * (1 - $arrtotal[$o]['bobot1']);
                                    $lol2[$o] = $arrtotal[$o]['bobot2'] + $arrtotal[$o + 1]['bobot2'] * (1 - $arrtotal[$o]['bobot2']);
                                    // echo "$lol[$o]<br>";
                                    for ($r = 1; $r < $count; $r++) {
                                        for ($p = ($r * 1); $p < ($r + 1); $p++) {
                                            $lol[$r] = $lol[$r - 1] + $arrtotal[$r]['bobot1'] * (1 - $lol[$r - 1]);
                                            $lol2[$r] = $lol[$r - 1] + $arrtotal[$r]['bobot2'] * (1 - $lol[$r - 1]);
                                            // echo $lol[$r]."<br>";
                                        }
                                        // echo "$lolz<br>";
                                    }
                                }

                                if ($lol[$count - 1] > $lol2[$count - 1]) {
                                    $_SESSION['hasilhitungCF'] = $lol[$count - 1];
                                    if ($lol2[$count - 1] > 0.5) {
                                        $_SESSION['hasil'] = "Moderate";
                                    } else {
                                        $_SESSION['hasil'] = "Stress";
                                    }
                                    echo "<script>alert('Terima kasih telah mengikuti tes depresi!')</script>";
                                    echo "<script>window.location.href = 'hasil.php';</script>";
                                } else {
                                    $_SESSION['hasilhitungCF'] = $lol2[$count - 1];
                                    if ($lol2[$count - 1] > 0.5) {
                                        $_SESSION['hasil'] = "Major";
                                    } else {
                                        $_SESSION['hasil'] = "Stress";
                                    }
                                    echo "<script>alert('Terima kasih telah mengikuti tes depresi!')</script>";
                                    echo "<script>window.location.href = 'hasil.php';</script>";
                                }
                            } else {
                                echo "<script>alert('Silahkan memilih minimal 3 Gejala')</script>";
                                echo "<script>window.location.href = 'soal.php';</script>";
                            }
                        }
                        ?>

                </tbody>
            </table>
            <div class="form-group text-right pb-5">
            </div>
    </main>
    </form>
<?php
                        if (isset($_POST['submit'])) {
                            $sql = "INSERT INTO konsultasi (Username, Namapasien, Email, Jeniskelamin, Tgllahir, Idpenyakit, Nilai_diagnosa) VALUES ('{$_SESSION['username']}', '{$_SESSION['Namapasien']}', '{$_SESSION['email']}', '{$_SESSION['jkel']}', '{$_SESSION['dob']}', '{$_SESSION['hasil']}','{$_SESSION['hasilhitungCF']}')";
                            if (mysqli_query($conn, $sql)) {
                                echo "<script>alert('Terima kasih telah mengikuti tes depresi!')</script>";
                                echo "<script>window.location.href = 'hasil.php';</script>";
                            } else {
                                echo "<script>alert('Soal Gagal di Input!')</script>";
                            }
                        }
                    } else {
                        echo "Data Soal Tidak ada!";
                    }
?>
<footer class="footer">
    <div class="container">
        <span class="text-muted">Selamat Mengerjakan.</span>
    </div>
</footer>
</body>

</html>