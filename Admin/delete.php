<?php
require('../connected/db.php');
session_start();
if ($_GET['type'] == "users") {
    if (isset($_GET['userid'])) {
        $id = $_GET['userid'];
        $update = mysqli_query($conn, "DELETE FROM users WHERE users.Id='$id'");
        if ($update) {
            header("Location: users.php");
?>
            <script type="text/javascript">
                alert("Data Berhasil Terhapus");
            </script>
        <?php
        } else {
            echo mysqli_error($conn);
        }
    }
} else {
    $_SESSION['kategori'] = $kategori;
    if (isset($_GET['Soalid'])) {
        $id = $_GET['Soalid'];
        $kategori = $_GET['kategori'];
        if ($kategori == "1") {
            $judul = "moderate";
        } else {
            $judul = "major";
        }
        $update = mysqli_query($conn, "DELETE FROM soal WHERE soal.Soalid='$id'");
        if ($update) {
            header("Location: penyakit.php?kategori=" . strtolower($judul));
        ?>
            <script type="text/javascript">
                alert("Data Berhasil Terhapus");
            </script>
<?php
        } else {
            echo mysqli_error($conn);
        }
    }
}
