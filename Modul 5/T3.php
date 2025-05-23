<!DOCTYPE html>
<html>
    <head>
        <title>Data Buku</title>
    </head>
    <body>
    <h2>Pilih Kode Buku</h2>
    <form method="post" action="">
        <select name="kode_buku" required>
            <option value="">-Pilih Kode-</option>
            <?php
            include "Koneksi.php";
            $q = "SELECT KD_BUKU FROM buku";
            $r = mysqli_query($db, $q) or die(mysqli_error($db));
            while ($data = mysqli_fetch_array($r)) {
                $selected = (isset($_POST['kode_buku']) && $_POST['kode_buku'] == $data['KD_BUKU']) ? "selected" : "";
                echo "<option value='{$data['KD_BUKU']}' $selected>{$data['KD_BUKU']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Tampilkan">
    </form>
    <br>
    <?php
    if (isset($_POST['kode_buku']) && $_POST['kode_buku'] != "") {
        $kode = $_POST['kode_buku'];
        $query = "SELECT * FROM buku WHERE KD_BUKU = '$kode'";
        $hasil = mysqli_query($db, $query) or die(mysqli_error($db));

        if (mysqli_num_rows($hasil) > 0) {
            $data = mysqli_fetch_array($hasil);
            echo "<h2>Identitas Buku</h2>";
            echo "<table width='50%' border='1' cellspacing='0' cellpadding='5'>
                <tr>
                    <td>KODE</td>
                    <td>JUDUL</td>
                    <td>PENGARANG</td>
                    <td>PENERBIT</td>
                </tr>
                <tr align='center'>
                    <td>{$data['KD_BUKU']}</td>
                    <td>{$data['JUDUL']}</td>
                    <td>{$data['PENGARANG']}</td>
                    <td>{$data['PENERBIT']}</td>
                </tr>
            </table>";
        }
    }
    ?>

    </body>
</html>
