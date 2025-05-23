<?php
    include "Koneksi.php";

    if (!isset($db)) {
        die("Database Tidak Tersambung");
    }

    if (isset($_GET['aksi']) && $_GET['aksi'] == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $q = "DELETE FROM peminjaman WHERE KODE_PINJAM = '$id'";
        mysqli_query($db, $q) or die(mysqli_error($db));
        echo "Data Peminjaman Berhasil Dihapus";
    }

    $kodepinjam = "";
    $tanggalpinjam = "";
    $nim = "";
    $kodebuku = "";
    $tanggalkembali = "";
    $tombol = "SIMPAN";
    $edit = false;

    if (isset($_GET['aksi']) && $_GET['aksi'] == "edit" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $q = "SELECT * FROM peminjaman WHERE KODE_PINJAM = '$id'";
        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        if ($data = mysqli_fetch_array($r)) {
            $kodepinjam = $data['KODE_PINJAM'];
            $tanggalpinjam = $data['TANGGAL_PINJAM'];
            $nim = $data['NIM'];
            $kodebuku = $data['KODE_BUKU'];
            $tanggalkembali = $data['TANGGAL_KEMBALI'];
            $tombol = "UPDATE";
            $edit = true;
        }
    }

    if (isset($_POST['submit'])) {
        $kodepinjam = $_POST['kodepinjam'];
        $tanggalpinjam = $_POST['tanggalpinjam'];
        $nim = $_POST['nim'];
        $kodebuku = $_POST['Kodebuku'];
        $tanggalkembali = $_POST['tanggalkembali'];

        if ($_POST['submit'] == "SIMPAN") {
            $q = "INSERT INTO peminjaman (KODE_PINJAM, TANGGAL_PINJAM, NIM, KODE_BUKU, TANGGAL_KEMBALI) 
                VALUES ('$kodepinjam', '$tanggalpinjam', '$nim', '$kodebuku', '$tanggalkembali')";
        } else if ($_POST['submit'] == "UPDATE") {
            $q = "UPDATE peminjaman SET 
                TANGGAL_PINJAM = '$tanggalpinjam',
                NIM = '$nim',
                KODE_BUKU = '$kodebuku',
                TANGGAL_KEMBALI = '$tanggalkembali'
                WHERE KODE_PINJAM = '$kodepinjam'";
        }

        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        if ($r) {
            echo "Data Peminjaman Berhasil Disimpan";
        } else {
            echo "Gagal menyimpan";
        }
    }

    $tampilData = false;
    if (isset($_POST['tampil']) && $_POST['tampil'] == "TAMPIL") {
        $tampilData = true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>INPUT DATA PEMINJAMAN</title>
    </head>
    <body>
        <form name="form1" method="post">
            <h2>INPUT DATA PEMINJAMAN</h2>
            <label>Kode Pinjam:</label> 
            <input type="text" name="kodepinjam" value="<?php echo $kodepinjam; ?>" <?php if ($edit) echo 'readonly'; ?>><br>

            <label>Tanggal Pinjam:</label> 
            <input type="date" name="tanggalpinjam" value="<?php echo $tanggalpinjam; ?>"><br>

            <label>NIM:</label> 
            <input type="text" name="nim" value="<?php echo $nim; ?>"><br>

            <label>Kode Buku:</label> 
            <input type="text" name="Kodebuku" value="<?php echo $kodebuku; ?>"><br>

            <label>Tanggal Kembali:</label> 
            <input type="date" name="tanggalkembali" value="<?php echo $tanggalkembali; ?>"><br><br>

            <input name="submit" type="submit" value="<?php echo $tombol; ?>">
            <input name="tampil" type="submit" value="TAMPIL">
        </form>
        <br>
        <?php if ($tampilData): ?>
            <h2>DATA PEMINJAMAN</h2>
            <table border="1" width="90%" cellpadding="5" cellspacing="0">
                <tr align="center">
                    <th>Kode Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Kembali</th>
                    <td colspan="2">Aksi</td>
                </tr>
                <?php
                    $q = "SELECT p.KODE_PINJAM, p.TANGGAL_PINJAM, p.NIM, m.NAMA, 
                                p.KODE_BUKU, b.JUDUL, p.TANGGAL_KEMBALI
                        FROM peminjaman p
                        LEFT JOIN mahasiswa m ON p.NIM = m.NIM
                        LEFT JOIN buku b ON p.KODE_BUKU = b.KD_BUKU";
                    $r = mysqli_query($db, $q) or die(mysqli_error($db));
                    while ($data = mysqli_fetch_array($r)) {
                        echo "<tr align='center'>
                            <td>{$data['KODE_PINJAM']}</td>
                            <td>{$data['TANGGAL_PINJAM']}</td>
                            <td>{$data['NIM']}</td>
                            <td>{$data['NAMA']}</td>
                            <td>{$data['KODE_BUKU']}</td>
                            <td>{$data['JUDUL']}</td>
                            <td>{$data['TANGGAL_KEMBALI']}</td>
                            <td><a href='?aksi=edit&aksi=edit&id={$data['KODE_PINJAM']}'>EDIT</a></td>
                            <td><a href='?aksi=delete&aksi=delete&id={$data['KODE_PINJAM']}'>HAPUS</a></td>
                        </tr>";
                    }
                ?>
            </table>
        <?php endif; ?>
    </body>
</html>
