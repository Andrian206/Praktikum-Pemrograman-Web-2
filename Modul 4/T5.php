<?php
include "Koneksi.php";

if (!isset($db)) {
    die("Database Tidak Tersambung");
}

// Proses simpan data
if (isset($_POST['submit']) && $_POST['submit'] == "SIMPAN") {
    $kodepinjam = $_POST['kodepinjam'];
    $tanggalpinjam = $_POST['tanggalpinjam'];
    $nim = $_POST['nim'];
    $kodebuku = $_POST['Kodebuku'];
    $tanggalkembali = $_POST['tanggalkembali'];

    $q = "INSERT INTO peminjaman (KODE_PINJAM, TANGGAL_PINJAM, NIM, KODE_BUKU, TANGGAL_KEMBALI) 
          VALUES ('$kodepinjam', '$tanggalpinjam', '$nim', '$kodebuku', '$tanggalkembali')";
    $r = mysqli_query($db, $q) or die(mysqli_error($db));

    if ($r) {
        echo "<p>Data Peminjaman Berhasil Disimpan</p>";
    } else {
        echo "<p>Data Peminjaman Gagal Disimpan</p>";
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
        <label>Kode Pinjam:</label> <input type="text" name="kodepinjam"><br>
        <label>Tanggal Pinjam:</label> <input type="date" name="tanggalpinjam"><br>
        <label>NIM:</label> <input type="text" name="nim"><br>
        <label>Kode Buku:</label> <input type="text" name="Kodebuku"><br>
        <label>Tanggal Kembali:</label> <input type="date" name="tanggalkembali"><br><br>

        <input name="submit" type="submit" value="SIMPAN">
        <input name="tampil" type="submit" value="TAMPIL">
    </form>

    <br>

    <?php if ($tampilData): ?>
        <h2>DATA PEMINJAMAN</h2>
        <table border="1" width="90%" cellpadding="5" cellspacing="0">
            <tr bgcolor="#00ff00" align="center">
                <th>Kode Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Tanggal Kembali</th>
            </tr>
            <?php
                $q = "SELECT p.KODE_PINJAM, p.TANGGAL_PINJAM, p.NIM, m.NAMA, 
                             p.KODE_BUKU, b.JUDUL, p.TANGGAL_KEMBALI
                      FROM peminjaman p
                      JOIN mahasiswa m ON p.NIM = m.NIM
                      JOIN buku b ON p.KODE_BUKU = b.KD_BUKU";
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
                    </tr>";
                }
            ?>
        </table>
    <?php endif; ?>
</body>
</html>
