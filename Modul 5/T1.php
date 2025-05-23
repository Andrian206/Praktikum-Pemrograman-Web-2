<?php
    include "Koneksi.php";

    if (!isset($db)) {
        die("Database Tidak Tersambung");
    }

    if (isset($_GET['aksi']) && $_GET['aksi'] == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $q = "DELETE FROM mahasiswa WHERE NIM = '$id'";
        mysqli_query($db, $q) or die(mysqli_error($db));
        echo "<p>Data Mahasiswa Berhasil Dihapus</p>";
    }

    $nim = "";
    $nama = "";
    $fakultas = "";
    $jurusan = "";
    $jenjang = "";
    $tombol = "SIMPAN";
    $edit = false;

    if (isset($_GET['aksi']) && $_GET['aksi'] == "edit" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $q = "SELECT * FROM mahasiswa WHERE NIM = '$id'";
        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        if ($data = mysqli_fetch_array($r)) {
            $nim = $data['NIM'];
            $nama = $data['NAMA'];
            $fakultas = $data['FAKULTAS'];
            $jurusan = $data['JURUSAN'];
            $jenjang = $data['JENJANG'];
            $tombol = "UPDATE";
            $edit = true;
        }
    }

    if (isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $fakultas = $_POST['fakultas'];
        $jurusan = $_POST['jurusan'];
        $jenjang = $_POST['jenjang'];

        if ($_POST['submit'] == "SIMPAN") {
            $q = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$fakultas','$jurusan','$jenjang')";
        } elseif ($_POST['submit'] == "UPDATE") {
            $q = "UPDATE mahasiswa SET 
                    NAMA = '$nama',
                    FAKULTAS = '$fakultas',
                    JURUSAN = '$jurusan',
                    JENJANG = '$jenjang'
                WHERE NIM = '$nim'";
        }

        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        if ($r) {
            echo "Data Mahasiswa Berhasil Disimpan";
        } else {
            echo "Data Mahasiswa Gagal Disimpan";
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
            <label>NIM:</label> 
            <input type="text" name="nim" value="<?php echo $nim; ?>" <?php if ($edit) echo 'readonly'; ?>><br>

            <label>Nama:</label> 
            <input type="text" name="nama" value="<?php echo $nama; ?>"><br>

            <label>Fakultas:</label> 
            <input type="text" name="fakultas" value="<?php echo $fakultas; ?>"><br>

            <label>Jurusan:</label> 
            <input type="text" name="jurusan" value="<?php echo $jurusan; ?>"><br>

            <label>Jenjang:</label> 
            <input type="text" name="jenjang" value="<?php echo $jenjang; ?>"><br><br>

            <input name="submit" type="submit" value="<?php echo $tombol; ?>">
            <input name="tampil" type="submit" value="TAMPIL">
        </form>

        <br>

        <?php if ($tampilData): ?>
            <h2>DATA MAHASISWA</h2>
            <table border="1" width="80%" cellpadding="5" cellspacing="0">
                <tr align="center">
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Jenjang</th>
                    <th colspan="2">Aksi</th>
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
                            <td><a href='?aksi=edit&id={$data['NIM']}'>EDIT</a></td>
                            <td><a href='?aksi=delete&id={$data['NIM']}'>HAPUS</a></td>
                        </tr>";
                    }
                ?>
            </table>
        <?php endif; ?>
    </body>
</html>
