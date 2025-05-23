<HTML>
    <BODY>
        <FORM METHOD="POST" ACTION="">
            <?php
                if (!isset($_POST['step'])) {
                    echo "Jumlah Data: <input type='number' name='total' min='1' required><br>";
                    echo "<input type='hidden' name='step' value='2'>";
                    echo "<input type='submit' value='Input Data'>";
                } elseif ($_POST['step'] == 2) {
                    $total = intval($_POST['total']);
                    echo "<input type='hidden' name='total' value='$total'>";
                    echo "<input type='hidden' name='step' value='3'>";
                    echo "Inputkan Bilangan:<br>";
                    for ($i = 0; $i < $total; $i++) {
                        echo "Angka[" . ($i + 1) . "]: <input type='number' name='angka[]' required><br>";
                    }
                    echo "<input type='submit' value='Tampil'>";
                } elseif ($_POST['step'] == 3) {
                    $angka = $_POST['angka'];
                    sort($angka); 
                    $total = array_sum($angka); 
                    $rata2 = $total / count($angka); 
                    echo "Inputan Bilangan:<br>";
                    foreach ($angka as $index => $value) {
                        echo "Angka [" . ($index + 1) . "]: " . htmlspecialchars($value) . "<br>";
                    }
                    echo "Total: " . $total;
                    echo "<br>Rata-rata: " . $rata2;
                }
            ?>
        </FORM>
    </BODY>
</HTML>