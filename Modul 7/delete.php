<?php
    include 'Koneksi.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM upload WHERE id = '$id'";
    $hasil = mysqli_query($db, $query);
    $data = mysqli_fetch_array($hasil);
    $namaFile = $data['name'];

    $query = "DELETE FROM upload WHERE id = '$id'";
    mysqli_query($db, $query);

    unlink("data/" . $namaFile);
    echo "File telah dihapus";
?>