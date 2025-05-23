<?php include 'koneksi.php'; ?>

<h2>Form Peminjaman Buku</h2>
<form action="" method="post">
    <label for="nim">NIM Mahasiswa:</label>
    <select name="nim" id="nim" onchange="getNama()">
        <option value="">-- Pilih NIM --</option>
        <?php
        $mhs = mysqli_query($db, "SELECT * FROM mahasiswa");
        while ($row = mysqli_fetch_assoc($mhs)) {
            echo "<option value='{$row['nim']}'>{$row['nim']}</option>";
        }
        ?>
    </select>
    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" placeholder="Nama Mahasiswa" readonly><br><br>

    <label for="kode_buku">Kode Buku:</label>
    <select name="kode_buku" id="kode_buku" onchange="getJudul()">
        <option value="">-- Pilih Kode Buku --</option>
        <?php
        $buku = mysqli_query($db, "SELECT * FROM buku");
        while ($row = mysqli_fetch_assoc($buku)) {
            echo "<option value='{$row['KD_BUKU']}'>{$row['KD_BUKU']}</option>";
        }
        ?>
    </select>
    <input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" readonly><br><br>

    <label for="tanggal">Tanggal Pinjam:</label>
    <input type="date" name="tanggal_pinjam"><br><br>
    <label for="tanggal">Tanggal Kembali:</label>
    <input type="date" name="tanggal_kembali"><br><br>
    <input type="submit" name="submit" value="Simpan">
</form>

<script>
function getNama() {
    var nim = document.getElementById("nim").value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_nama.php?nim=" + nim, true);
    xhr.onload = function() {
        document.getElementById("nama_mahasiswa").value = this.responseText;
    };
    xhr.send();
}

function getJudul() {
    var kode = document.getElementById("kode_buku").value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_judul.php?kode=" + kode, true);
    xhr.onload = function() {
        document.getElementById("judul_buku").value = this.responseText;
    };
    xhr.send();
}
</script>
<form action="tampil_peminjam.php" method="get">
    <button type="submit">📄 Lihat Data peminjam</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $tanggal = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $insert = "INSERT INTO peminjaman (nim, nama_mahasiswa, KD_BUKU, JUDUL, tanggal_pinjam, tanggal_kembali)
               VALUES ('$nim', '$nama', '$kode', '$judul', '$tanggal' , '$tanggal_kembali')";

    if (mysqli_query($db, $insert)) {
        echo "🎉 Data peminjaman berhasil disimpan!";
    } else {
        echo "💥 Gagal menyimpan: " . mysqli_error($db);
    }
}
?>
