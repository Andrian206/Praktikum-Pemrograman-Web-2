<?php
    include "classManusia.php";

    class Sopir extends Manusia {
        public function __construct($n) {
            parent::__construct($n);
        }

        public function kerja() {
            echo "Ngung... Ngung... Ngung...Ciiit..<br>";
        }
    }
?>
