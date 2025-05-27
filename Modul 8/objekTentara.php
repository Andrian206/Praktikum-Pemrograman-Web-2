<?php
    include "classTentara.php";

    $badu = new Tentara("Badu", "Kopral");
    echo "Nama = " . $badu->tampilkanNama();
    echo "<br>Pangkat = " . $badu->tampilkanPangkat();
    $badu->makan();
    $badu->kerja();
?>
