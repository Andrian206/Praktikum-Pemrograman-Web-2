<?php
    extract($_POST);
    include 'Koneksi.php';
    $query = "SELECT * FROM upload";
    $hasil = mysqli_query($db, $query);
    while($data = mysqli_fetch_array($hasil)) {
        echo "<p><a href='download.php?id=".$data['id']."'>".$data['name']."</a> (".$data['size']." bytes)
        [<a href='delete.php?id=".$data['id']."'>Delete</a>]</p>";
    }
?>