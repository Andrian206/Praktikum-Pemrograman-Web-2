<!DOCTYPE html>
<html lang = "id">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <title>Hitung Luas Lingkaran</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            h2 {
                color: #333;
                margin-bottom: 20px;
            }
            form {
                background-color: #fff;
                padding: 30px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                width: 300px;
                text-align: center;
            }
            label {
                display: block;
                margin-bottom: 8px;
                font-size: 14px;
                color: #333;
            }
            input[type="text"] {
                padding: 12px;
                width: 100%;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-bottom: 15px;
                box-sizing: border-box;
            }
            input[type="submit"] {
                padding: 12px 18px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
                box-sizing: border-box;
            }
            input[type="submit"]:hover {
                background-color: #218838;
            }
        </style>
    </head>
    <body>
        <form method = "POST" action = "">
            <h2>Hitung Luas Lingkaran</h2>
            <label for = "jari">Masukkan jari-jari</label>
            <input type = "text" id = "jari" name = "jari" value = "<?php echo isset($_POST['jari']) ? $_POST['jari'] : ''; ?>"><br><br>
            <input type = "submit" value = "Hitung">
        </form>
        <?php
        if (isset($_POST['jari'])) {
            $jari = $_POST['jari'];

            if (empty($jari)) {
                echo "<script>alert('Jari-jari tidak boleh kosong!');</script>";
            } else if (!is_numeric($jari)) {
                echo "<script>alert('Input harus berupa angka!');</script>";
            } else {
                $phi = 3.14;
                $luas = $phi * $jari * $jari;
                echo "<script>alert('Luas lingkaran dengan jari-jari $jari adalah $luas');</script>";
            }
        }
        ?>
    </body>
</html>
