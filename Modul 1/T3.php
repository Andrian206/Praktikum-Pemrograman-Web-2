<!DOCTYPE html>
<html lang = "id">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <title>Hitung Nilai Akhir dan Mutu Nilai</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(102deg, rgb(0, 116, 231), rgb(189, 150, 237));;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            form {
                background-color: #fff;
                padding: 25px 30px;
                border-radius: 10px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                width: 300px;
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
            }
            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin: 8px 0 16px 0;
                border: 1px solid #ccc;
                border-radius: 6px;
            }
            input[type="submit"] {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px;
                width: 100%;
                border-radius: 6px;
                cursor: pointer;
            }
            .result {
                margin-top: 20px;
                padding: 15px;
                background-color: #e9ffe9;
                border: 1px solid #a6d8a8;
                border-radius: 6px;
            }
        </style>
    </head>
    <body>
        <form method = "POST">
            <h2>Hitung Nilai</h2>
            <label>Nilai UAS </label>
            <input type = "text" name = "uas" required>

            <label>Nilai UTS </label>
            <input type = "text" name = "uts" required>

            <label>Nilai Quiz </label>
            <input type = "text" name = "quiz" required>

            <label>Nilai Tugas </label>
            <input type = "text" name = "tugas" required>

            <input type = "submit" value = "Hitung">
            <?php
            if (isset($_POST['uas']) && isset($_POST['uts']) && isset($_POST['quiz']) && isset($_POST['tugas'])) {
                $uas   = $_POST['uas'];
                $uts   = $_POST['uts'];
                $quiz  = $_POST['quiz'];
                $tugas = $_POST['tugas'];

                if (!is_numeric($uas) || !is_numeric($uts) || !is_numeric($quiz) || !is_numeric($tugas)) {
                    echo "<script>alert('Semua input harus berupa angka!');</script>";
                } else {
                    $NA = (3 * $uas / 10) + (3 * $uts / 10) + ($quiz / 5) + ($tugas / 5);

                    if ($NA > 100 || $NA < 0) {
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
                        echo "<div class='result'>
                                <strong>Nilai Akhir:</strong> " . number_format($NA, 2) . "<br>
                                <strong>Huruf Mutu:</strong> $HM
                            </div>";
                    }
                }
            }
            ?>
        </form>
    </body>
</html>
