<?php
    $NA = 95; 
    if ($NA > 100 || $NA < 0) { // Sesudah Modifikasi
        echo "Maaf Nilai Anda Harus Lebih dari sama dengan 0 dan Kurang dari sama dengan 100";
    } else {
        switch (true) {
            case ($NA >= 90):
                $HM = 'A';
                break;
            case ($NA >= 70):
                $HM = 'B';
                break;
            case ($NA >= 60):
                $HM = 'C';
                break;
            case ($NA >= 50):
                $HM = 'D';
                break;
            default:
                $HM = 'E';
                break;
        }
        echo "Nilai Anda = $NA<BR>
        Huruf Mutu Nilai = $HM";
    }
?> 
