<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <title>Perhitungan Gaji Karyawan</title>
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                font-family: Arial, sans-serif;
                height: 100vh;
                margin: 0;
                display: flex;
                justify-content: center; 
                align-items: center;     
                background: linear-gradient(102deg, rgb(0, 116, 231), rgb(189, 150, 237));;
            }
            .container {
                width: 400px;
                border-radius: 10px;
                border: 1px solid #ccc;
                padding: 20px;
                background-color: white;
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
            }
            h3 {
                text-align: center;
                text-transform: uppercase;
            }
            label {
                display: inline-block;
                width: 100px;
            }
            select, input[type="submit"] {
                padding: 5px;
                width: 100px;
                margin-left: 10px;
            }
            .result {
                margin-top: 20px;
            }
            .result label {
                width: 120px;
                display: inline-block;
            }
            .line {
                border-top: 2px solid black;
                margin: 10px 0;
                width: 90%;
            }
            input[type="submit"] {
                background-color: #444;
                color: white;
                border: none;
                cursor: pointer;
            }
            input[type="submit"] {
                background-color: #007bff;
                border-radius: 6px;
            }
        </style>
    </head>
    <body>
        <div class = "container">
            <h3>PERHITUNGAN GAJI KARYAWAN</h3>
            <form method = "post">
                <label>Golongan</label>
                <select name = "golongan">
                    <option value = "I">I</option>
                    <option value = "II">II</option>
                    <option value = "III">III</option>
                </select>
                <br><br>
                <input type = "submit" name = "hitung" value = "HITUNG">
            </form>

            <?php
            if (isset($_POST['hitung'])) {
                $gol = $_POST['golongan'];

                $gpk = 0;
                $tjngn = 0;
                $ptngn = 0;

                if ($gol == "I") {
                    $gpk = 500000;
                    $tjngn = 175000;
                    $ptngn = $gpk / 10;
                } elseif ($gol == "II") {
                    $gpk = 750000;
                    $tjngn = 155000;
                    $ptngn = 3 / 40 * $gpk;
                } elseif ($gol == "III") {
                    $gpk = 1000000;
                    $tjngn = 146000;
                    $ptngn = $gpk / 20;
                }

                $total_gaji = $gpk + $tjngn + $ptngn;

                echo "<div class='result'>";
                echo "<label>Gaji Pokok</label>:" . number_format($gpk, 0, ',', '.') . "<br>";
                echo "<label>Tunjangan</label>:" . number_format($tjngn, 0, ',', '.') . "<br>";
                echo "<label>Potongan</label>:" . number_format($ptngn, 0, ',', '.') . "<br>";
                echo "======================================<br>";
                echo "<label>Total Gaji</label>:" . number_format($total_gaji, 0, ',', '.') . "<br>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
</html>
