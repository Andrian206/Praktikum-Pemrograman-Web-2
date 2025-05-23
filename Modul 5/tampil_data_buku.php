<?php
    include "Koneksi.php"; 
    extract($_GET);
    $menu = isset($_GET['menu']) ? $_GET['menu'] : "";
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    if($menu == "edit_buku" && $id != ""){
        $q = "SELECT * FROM buku WHERE KD_BUKU='$id'";
        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        $data = mysqli_fetch_array($r);
    } else if($menu == "tampil_buku"){
        $q = "SELECT * FROM buku";
        $r = mysqli_query($db, $q) or die(mysqli_error($db));
        $jml = mysqli_num_rows($r);
    }
?>
