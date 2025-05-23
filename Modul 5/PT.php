<html>
    <head>
        <title>LOGIN</title>
    </head>
    <body>
        <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if ($username == "" || $password == "") {
                    echo "Username dan Password tidak boleh kosong!";
                } else {
                    if ($username == "rio123" && $password == "1234") {
                        echo "Login berhasil! Selamat datang, $username";
                        header("Location: index.php");
                    } else {
                        echo "Username atau Password salah!";
                    }
                }
            }
        ?>
        <form name="form1" method="post" action="">
            <h2>LOGIN</h2>
            <label>Username:</label> <input type="text" name="username"><br>
            <label>Password:</label> <input type="password" name="password"><br><br>
            
            <input name="submit" type="submit" value="LOGIN">
        </form>
    </body>
</html>
