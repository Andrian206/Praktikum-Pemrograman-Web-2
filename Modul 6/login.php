<?php
    session_start();
    include "Koneksi.php";

    $error = "";

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $q = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";
        $r = mysqli_query($db, $q);

        if (mysqli_num_rows($r) == 1) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error = "Username atau Password salah!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Admin</title>
        <style>
            * {
                margin : 0;
                padding : 0;
                box-sizing : border-box;
                font-family : Arial, sans-serif;
            }
            body {
                display : flex;
                justify-content : center;
                align-items : center;
                height : 100vh;
                background : linear-gradient(102deg, rgb(0, 116, 231), rgb(189, 150, 237));
            }
            .container {
                background : rgba(255, 255, 255, 0.8);
                padding : 20px;
                border-radius : 10px;
                box-shadow : 0px 4px 10px rgba(14, 14, 14, 0.2);
                text-align : left;
                width : 540px;
            }
            h4 {
                text-align : center;
                margin-bottom : 15px;
                color : black;
                font-family : Arial, sans-serif;
            }
            table {
                width : 100%;
                margin-bottom : 15px;
            }
            td {
                font-size : 13px;
            }
            input[type="text"],
            input[type="password"] {
                width : 100%;
                padding : 5px;
                margin-top : 5px;
                border : 1.5px solid #ccc;
                border-radius : 7px;
            }
            input[type="submit"] {
                background : rgb(0, 85, 255);
                color : white;
                border : none;
                padding : 10px;
                border-radius : 5px;
                cursor : pointer;
                width : 100%;
                font-size : 13px;
            }
            input[type="submit"]:hover {
                background : rgb(21, 99, 189);
            }
            .error {
                color: red;
                margin-bottom: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h4>Login Admin</h4>
            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post" action="">
                <table>
                    <tr>
                        <td><label>Username:</label></td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label>Password:</label></td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

https://github.com/bayuimantoro/SushiOn3.git
