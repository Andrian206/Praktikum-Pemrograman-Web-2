<?php
    class SepedaMotor {
        private $merk;
        private $tipe;
        private $tangki;
        private $harga;

        function setMerk($merk) {
            $this->merk = $merk;
        }
        
        function getMerk() {
            return $this->merk;
        }
    }
?>
