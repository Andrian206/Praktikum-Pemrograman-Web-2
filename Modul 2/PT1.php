<HTML>
    <BODY>
        <FORM METHOD="POST" ACTION="">
            <?php
                if (!isset($_POST['step'])) {
                    echo "Jumlah Data: <input type='number' name='total' min='1' required><br>";
                    echo "<input type='hidden' name='step' value='2'>";
                    echo "<input type='submit' value='Lanjut'>";
                } elseif ($_POST['step'] == 2) {
                    $total = intval($_POST['total']);
                    echo "<input type='hidden' name='total' value='$total'>";
                    echo "<input type='hidden' name='step' value='3'>";
                    echo "Masukkan Nama:<br>";
                    for ($i = 0; $i < $total; $i++) {
                        echo "Nama[" . ($i) . "]: <input type='text' name='nama[]' required><br>";
                    }
                    echo "<input type='submit' value='Tampilkan'>";
                } elseif ($_POST['step'] == 3) {
                    $nama = $_POST['nama'];
                    echo "Data Nama:<br>";
                    foreach ($nama as $index => $value) {
                        echo "Nama [" . ($index) . "]: " . htmlspecialchars($value) . "<br>";
                    }
                }
            ?>
        </FORM>
    </BODY>
</HTML>