<?php
    include "Koneksi.php";
    extract($_GET);

    if (isset($menu)) {
        if ($menu == "edit_buku") {
            include "input_buku.php";
            return;
        } else if ($menu == "hapus_buku") {
            $q = "DELETE FROM buku WHERE KD_BUKU='$id'";
            $r = mysqli_query($db, $q) or die(mysqli_error($db));
            if ($r) {
                echo "Data berhasil dihapus!";
            } 
        }
    }
?>