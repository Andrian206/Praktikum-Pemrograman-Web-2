<?php
    include 'Koneksi.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM upload WHERE id = '$id'";
    $hasil = mysqli_query($db, $query);
    $data = mysqli_fetch_array($hasil);

    header('Content-Disposition: attachment; filename="' . $data['name'] . '"');
    header("Content-length: {$data['size']}");
    header("Content-type: {$data['type']}");
    $fp = fopen("data/" . $data['name'], "r");
    $content = fread($fp, filesize("data/" . $data['name']));
    fclose($fp);

    echo $content;
    exit;
?>