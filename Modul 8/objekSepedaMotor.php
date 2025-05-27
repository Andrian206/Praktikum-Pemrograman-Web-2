<?php
    include "classSepedaMotor.php";

    $motor = new SepedaMotor();
    $motor->setMerk("Honda");
    echo "Merk Motor: " . $motor->getMerk();
?>