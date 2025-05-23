<html>
    <head>
        <title>Latihan SESSION</title>
    </head>
    <?php
        if(!isset($user)){
            die("Anda belum Register atau Mendaftar");
        } else {
            echo "<p><a href=keluar_session.php>LOGOUT</a>";
            echo "<h2>Welcome To My Website, $user</h2>";
        }
    ?>
    <body>
    </body>
</html>