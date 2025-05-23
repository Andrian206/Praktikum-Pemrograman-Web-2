<h2>DATA BUKU</h2>
<table width="50%" border="1" cellspacing="0" cellpadding="5">
    <tr bgcolor="#00ff00" align="center">
        <td>KODE</td>
        <td>JUDUL</td>
        <td>PENGARANG</td>
        <td>PENERBIT</td>
    </tr>
    <?php
        include "tampil_data_buku.php";
        while($data = mysqli_fetch_array($r)){
            echo "<tr>
            <td>{$data['KD_BUKU']}</td>
            <td>{$data['JUDUL']}</td>
            <td>{$data['PENGARANG']}</td>
            <td>{$data['PENERBIT']}</td>
            </tr>";
        }
    ?>
</table>

