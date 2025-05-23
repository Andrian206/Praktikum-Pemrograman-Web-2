<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $database = "perpustakaan_fkom";

    $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $database);

    if (!$db) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }
?>
