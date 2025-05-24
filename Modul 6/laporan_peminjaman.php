<html>
    <head>
        <title>Laporan Data Peminjaman</title>
        <style>
            .cetak-container {
                width: 90%;
                margin-top: 20px;
                text-align: right;
            }
            .tmbl-cetak {
                background-color: #007bff;
                color: white;
                padding: 8px 16px;
                text-decoration: none;
                border-radius: 5px;
                font-size: 14px;
            }
            .tmbl-cetak:hover {
                background-color: #0056b3;
            }
            @media print {
                .no-print {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <h2>LAPORAN DATA PEMINJAMAN</h2>
        <table width="90%" border="1">
            <tr bgcolor="#00ff00" align="center" valign="middle">
                <td>KODE PINJAM</td>
                <td>NIM</td>
                <td>NAMA MAHASISWA</td>
                <td>KODE BUKU</td>
                <td>JUDUL BUKU</td>
                <td>TANGGAL PINJAM</td>
                <td>TANGGAL KEMBALI</td>
            </tr>
            <?php
                include "Koneksi.php";
                $q = "SELECT p.KODE_PINJAM, p.NIM, m.NAMA, 
                             p.KODE_BUKU, b.JUDUL, p.TANGGAL_PINJAM, p.TANGGAL_KEMBALI
                      FROM peminjaman p
                      LEFT JOIN mahasiswa m ON p.NIM = m.NIM
                      LEFT JOIN buku b ON p.KODE_BUKU = b.KD_BUKU";
                $r = mysqli_query($db, $q) or die(mysqli_error($db));
                while($data = mysqli_fetch_array($r)){
                    echo "<tr align='center'>
                        <td>{$data['KODE_PINJAM']}</td>
                        <td>{$data['NIM']}</td>
                        <td>{$data['NAMA']}</td>
                        <td>{$data['KODE_BUKU']}</td>
                        <td>{$data['JUDUL']}</td>
                        <td>{$data['TANGGAL_PINJAM']}</td>
                        <td>{$data['TANGGAL_KEMBALI']}</td>
                    </tr>";
                }
            ?>
        </table>

        <div class="cetak-container no-print">
            <a href="cetak_laporan_peminjaman.php" target="_blank" class="tmbl-cetak">Cetak PDF</a>
        </div>
    </body>
</html>
