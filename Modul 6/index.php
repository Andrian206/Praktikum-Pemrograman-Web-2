<html>
    <head>
        <title>PERUSAHAAN PERPUSTAKAAN FKOM UNIKU</title>
    </head>
    <body>
        <h2>PERPUSTAKAAN ONLINE</h2>
        <?php include "Koneksi.php"; ?>
        <p>
            <?php include "menu.php"; ?>
        </p>
        <hr color = "green" size = "14"/>
        <?php
            if (isset($_GET['menu'])) {
                $menu = strtolower($_GET['menu']);
            
                if ($menu == "input_buku") {
                    include "input_buku.php";
                } elseif ($menu == "tampil_buku") {
                    include "tampil_buku.php";
                } elseif ($menu == "simpan_buku") {
                    include "simpan_buku.php";
                } elseif ($menu == "pilih_buku") {
                    include "kode_buku.php";
                } elseif ($menu == "edit_buku") {
                    include "aksi_buku.php";
                } elseif ($menu == "hapus_buku") {
                    include "aksi_buku.php";
                } 
            }
        ?>
    </body>
</html>
