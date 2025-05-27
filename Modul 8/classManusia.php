<?php
    class Manusia {
        public $nama;
        function __construct($nama) {
            $this->nama = $nama;
        }

        function tampilkanNama() {
            return $this->nama;
        }

        function makan() {
            echo "Nyam... nyam... nyam... nyam...<br>";
        }   

        function kerja() {
            echo "Kerja... kerjaaa...<br>";
        }
    }
?>