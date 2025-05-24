<?php
    session_start();

    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        if (!isset($_GET['menu']) || ($_GET['menu'] != 'login' && $_GET['menu'] != 'logout')) {
            header("Location: index.php?menu=login");
            exit();
        }
    }

    $menu = isset($_GET['menu']) ? strtolower($_GET['menu']) : '';
?>

<html>
    <head>
        <title>PERUSAHAAN PERPUSTAKAAN FKOM UNIKU</title>
    </head>
    <body>
        <?php if ($menu == 'logout'): ?>
            <?php include "$menu.php"; ?>
        <?php else: ?>
            <h2>PERPUSTAKAAN ONLINE</h2>
            <?php include "Koneksi.php"; ?>
            <p>
                <?php include "menu.php"; ?>
            </p>
            <hr color="blue" size="14"/>
            
            <?php
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
            ?>
        <?php endif; ?>
    </body>
</html>
