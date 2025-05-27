<?php
    include "classProgrammer.php";

    $sandi = new Programmer("Andi");
    echo "Nama = " . $sandi->tampilkanNama() . "<br>";
    $sandi->makan();
    $sandi->kerja();
    $sandi->bersantai();
?>
