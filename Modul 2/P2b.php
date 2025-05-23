<HTML>
    <BODY>
        <FORM NAME="FORM1" METHOD="GET" action="P2b.php">
            <?php
                for($i = 0; $i <= 2; $i++) {
                    echo "<input type='text' name='buah_buahan[$i]'><br>";
                }
                echo "<br><input type='submit' name='tampil' value='TAMPIL'>";
                
                if (isset($_GET['buah_buahan'])) {
                    $buah_buahan = $_GET['buah_buahan'];
                    echo "<br> ======================
                    <br> Data Buah-Buahan : <br>
                    ====================== <br>";
                    for($i = 0; $i <= 2; $i++){
                        echo "$buah_buahan[$i]<br>";
                    }
                }
            ?>
        </FORM>
    </BODY>
</HTML>