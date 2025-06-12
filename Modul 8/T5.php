<?php
    class Brainrot {
        public function rizz() {
            echo "Brainrot: Menggunakan Mode On Aktif Dinyalakan!<br>";
        }
    }

    class Skibidi extends Brainrot {
        public function rizz() {
            echo "Skibidi: Yes Yes <br>";
        }
    }

    class Sigma extends Brainrot {
        public function rizz() {
            echo "Sigma: Mewing sampai Ohio<br>";
        }
    }

    function tampilkanRizz(Brainrot $objek) {
        $objek->rizz();
    }

    $skibidi = new Skibidi();
    $sigma = new Sigma();

    tampilkanRizz($skibidi);  
    tampilkanRizz($sigma);   
?>
