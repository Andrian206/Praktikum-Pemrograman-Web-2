<?php
    include "Koneksi.php";

    if (!isset($db)) {
        die("Database Tidak Tersambung");
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "SIMPAN") {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $fakultas = $_POST['fakultas'];
        $jurusan = $_POST['jurusan'];
        $jenjang = $_POST['jenjang'];

        $q = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$fakultas','$jurusan','$jenjang')";
        $r = mysqli_query($db, $q) or die(mysqli_error($db));

        if ($r) {
            echo "<p>Data Mahasiswa Berhasil Disimpan</p>";
        } else {
            echo "<p>Data Mahasiswa Gagal Disimpan</p>";
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
    <title>INPUT DATA MAHASISWA</title>
</head>
<body>
    <form name="form1" method="post">
        <h2>INPUT DATA MAHASISWA</h2>
        <label>NIM:</label> <input type="text" name="nim"><br>
        <label>Nama:</label> <input type="text" name="nama"><br>
        <label>Fakultas:</label> <input type="text" name="fakultas"><br>
        <label>Jurusan:</label> <input type="text" name="jurusan"><br>
        <label>Jenjang:</label> <input type="text" name="jenjang"><br><br>

        <input name="submit" type="submit" value="SIMPAN">
        <input name="tampil" type="submit" value="TAMPIL">

    </form>

    <br>

    <?php if ($tampilData): ?>
        <h2>DATA MAHASISWA</h2>
        <table border="1" width="70%" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>Jenjang</th>
            </tr>
            <?php
                $q = "SELECT * FROM mahasiswa";
                $r = mysqli_query($db, $q) or die(mysqli_error($db));
                while ($data = mysqli_fetch_array($r)) {
                    echo "<tr align='center'>
                        <td>{$data['NIM']}</td>
                        <td>{$data['NAMA']}</td>
                        <td>{$data['FAKULTAS']}</td>
                        <td>{$data['JURUSAN']}</td>
                        <td>{$data['JENJANG']}</td>
                    </tr>";
                }
                ?>
        </table>
    <?php endif; ?>
</body>
</html>
