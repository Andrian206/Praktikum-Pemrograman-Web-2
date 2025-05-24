<?php
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header("Location: login.php");
        exit();
    }

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: linear-gradient(102deg, rgb(0, 116, 231), rgb(189, 150, 237));
            }
            .container {
                background: rgba(255, 255, 255, 0.8);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(14, 14, 14, 0.2);
                text-align: center;
                width: 400px;
            }
            h4 {
                margin-bottom: 20px;
                color: black;
            }
            input[type="submit"] {
                background: rgb(0, 85, 255);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 14px;
                width: 100%;
            }
            input[type="submit"]:hover {
                background: rgb(21, 99, 189);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h4>Apakah Anda yakin ingin logout?</h4>
            <form method="post" action="">
                <input type="submit" name="logout" value="Logout">
            </form>
        </div>
    </body>
</html>
