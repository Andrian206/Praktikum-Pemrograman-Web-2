<?php
    // Sesudah Modifikasi
    echo "Angka Ganjil:<br>";
    for ($angka = 1; $angka <= 10; $angka++) {
        if ($angka % 2 != 0) { 
            echo "Angka Ke - $angka <br>";
        }
    }

    echo "<br>Angka Genap:<br>";
    for ($angka = 1; $angka <= 10; $angka++) {
        if ($angka % 2 == 0) {
            echo "Angka Ke - $angka <br>";
        }
    }
?> 
