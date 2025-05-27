<?php
    include "classManusia.php";
    $andi = new Manusia("Andi");
    echo "Nama saya: " . $andi->tampilkanNama() . "<br>";
    $andi->makan();
?>