<?php
    class Mawar {
        public $tumbuh = "tanaman ini bertumbuh dalam bentuk semak-semak";
        public $batang = "memiliki batang yang berduri";
        public $harum = "aromanya wangi";

        public function detail() {
            echo "$this->tumbuh";
            echo ", $this->batang";
            echo ", $this->harum";
        }
    }

    class mawarPutih extends Mawar {
        public $warna = "putih";

        public function detail() {
            parent::detail();
            echo " dan berwarna $this->warna<br>";
        }
    }

    class mawarMerah extends Mawar {
        public $warna = "merah";

        public function detail() {
            parent::detail();
            echo " dan berwarna $this->warna<br>";
        }
    }

    echo "<h4>Mawar Putih</h4>";
    $putih = new mawarPutih();
    $putih->detail();

    echo "<h4>Mawar Merah</h4>";
    $merah = new mawarMerah();
    $merah->detail();
?>
