<html>
    <head>
        <title>INPUT DATA BUKU</title>
    </head>
    <body>
        <?php include "tampil_data_buku.php"; 
        include "Koneksi.php";
            $kode = "";
            $judul = "";
            $pengarang = "";
            $penerbit = "";
            $tombol = "SIMPAN";

            if (isset($_GET['menu']) && $_GET['menu'] == "edit_buku" && isset($_GET['id'])) {
                $id = $_GET['id'];
                $q = "SELECT * FROM buku WHERE KD_BUKU='$id'";
                $r = mysqli_query($db, $q) or die(mysqli_error($db));
                $data = mysqli_fetch_array($r);

                if ($data) {
                    $kode = $data['KD_BUKU'];
                    $judul = $data['JUDUL'];
                    $pengarang = $data['PENGARANG'];
                    $penerbit = $data['PENERBIT'];
                    $tombol = "UPDATE";
                }
            }
        ?>
        <form name="form1" method="post" action="index.php?menu=simpan_buku">
            <h2>INPUT DATA BUKU</h2>
            <label>Kode Buku:</label> <input type="text" name="kode_buku" value="<?php echo "$kode"; ?>"><br>
            <input type="hidden" name="id_buku" value="<?php echo "$kode"; ?>">
            <label>Judul Buku:</label> <input type="text" name="judul_buku" value="<?php echo "$judul"; ?>"><br>
            <label>Pengarang:</label> <input type="text" name="pengarang_buku" value="<?php echo "$pengarang"; ?>"><br>
            <label>Penerbit:</label> <input type="text" name="penerbit_buku" value="<?php echo "$penerbit"; ?>"><br><br>

            <input name="submit" type="submit" value="<?php echo $tombol; ?>">
            <input name="batal" type="reset" value="BATAL">
        </form>
    </body>
</html>
