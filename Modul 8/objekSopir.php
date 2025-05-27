<?php
    include "classSopir.php";

    $dedi = new Sopir("Dedi");
    echo "Nama = " . $dedi->tampilkanNama() . "<br>";
    $dedi->makan();
    $dedi->kerja();
?>
