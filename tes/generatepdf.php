<?php
session_start();
require('../vendor/autoload.php');
if ($_SESSION['hasil'] == "Major") {
    $penanganan='
    <table class="table table-striped">
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
} else { 
    $penanganan = '
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
}
$html='
    <!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/bootstrap-5.1.1-dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container pt-3">
        <div class="row">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <p>
                                <img src="https://1.bp.blogspot.com/-BRsADaaCMNw/Way3PdGhJ6I/AAAAAAAAKDE/VOBhm-rTg1MxO-4vOLSkX6GBo6SROLVhQCK4BGAYYCw/s1600/lambang%2Bpsikologi.png" alt="" width="100"><br>Psikolog Online</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h1 class="text-center" style="font-size:20px; padding-bottom:10px;">SURAT KETERANGAN PSIKOLOG ONLINE</h1>
                            <p>Berdasarkan hasil yang didapat dari analisa yang telah dilakukan maka data yang didapat adalah sebagai berikut :</p>
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>'.$_SESSION['Namapasien'].'</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>'.$_SESSION['dob'].'</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>'.$_SESSION['jkel'].'</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>'.$_SESSION['alamat'].'</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>'.$_SESSION['email'].'</td>
                                </tr>
                                <tr>
                                    <td>Hasil</td>
                                    <td>:</td>
                                    <td>'.$_SESSION['hasil'].' Depression</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Konsultasi</td>
                                    <td>:</td>
                                    <td>'.date("F j, Y, g:i a").'</td>
                                </tr>
                            </table>
                            <p style="padding-top:5px;">Anda mengidap tingkat depresi '.$_SESSION['hasil'].' dengan hasil persentase '.round($_SESSION['hasilhitungCF'] * 100).'%
                            <p>Penanganan :</p>'.$penanganan.'<p>Terimakasih telah mengikuti tes di psikolog online. untuk tahap selanjutnya ikuti anjuran penangan yang telah diberikan.</p><p style="padding-top:210px;" class="text-end"><u>Oktofandy S Y, S.Psi., M.Psi., Psikolog</u>';
$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('stylesheet.css');
$mpdf->WriteHTML($html);

//call watermark content aand image
$mpdf->SetWatermarkText('PSIKOLOG ONLINE');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;


//save the file put which location you need folder/filname
$mpdf->Output("Hasil Tes ".$_SESSION['Namapasien'].".pdf", 'I');


//out put in browser below output function
$mpdf->Output("Hasil Tes ".$_SESSION['Namapasien'].".pdf", 'I');
?>