<html>
    <head>
        <title>DATA BUKU</title>
    </head>
    <body>
        <?php include "aksi_buku.php"; ?>
        <h2>DATA BUKU</h2>
        <table width="50%" border="1" cellspacing="0" cellpadding="5">
            <tr bgcolor="#00ff00" align="center">
                <td>KODE</td>
                <td>JUDUL</td>
                <td>PENGARANG</td>
                <td>PENERBIT</td>
                <td colspan="2">AKSI</td>
            </tr>
            <?php
                include "tampil_data_buku.php";
                while($data = mysqli_fetch_array($r)){
                    echo "<tr>
                    <td>{$data['KD_BUKU']}</td>
                    <td>{$data['JUDUL']}</td>
                    <td>{$data['PENGARANG']}</td>
                    <td>{$data['PENERBIT']}</td>
                    <td><a href='index.php?menu=edit_buku&aksi=edit&id={$data['KD_BUKU']}'>EDIT</a></td>
                    <td><a href='index.php?menu=hapus_buku&aksi=delete&id={$data['KD_BUKU']}'>HAPUS</a></td>
                    </tr>";
                }
            ?>
        </table>
    </body>
</html>

