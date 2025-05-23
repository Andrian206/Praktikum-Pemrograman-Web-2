<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Sebelum Modifikasi
        $submit = $_POST['submit'] ?? null;
        $pesan = $_POST['pesan'] ?? '';
        $bilangan = $_POST['bilangan'] ?? null;
        function tampilAlert($pesan) {
            echo "<script>alert('Pesan: $pesan');
            window.history.go(-1);</script>";
        }
        function kuadrat($bilangan) {
            if (!is_numeric($bilangan)) {
                echo "<script>alert('Input harus berupa angka!');
                window.history.go(-1);</script>";
                return;
            }
            $kuadrat = pow($bilangan, 2);
            echo "<script>alert('Hasil $bilangan kuadrat = $kuadrat');
            window.history.go(-1);</script>";
        }

        switch ($submit) {
            case "Tampilkan":
                if (!empty($pesan)) {
                    tampilAlert($pesan);
                } else {
                    echo "<script>alert('Pesan tidak boleh kosong!');
                    window.history.go(-1);</script>";
                }
                break;
            case "Kuadrat":
                kuadrat($bilangan);
                break;
            default:
                echo "<script>alert('Aksi tidak valid!');
                window.history.go(-1);</script>";
                break;
        }
    }    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $submit = $_POST['submit'] ?? null;
            $pesan = $_POST['pesan'] ?? '';
            $bilangan = $_POST['bilangan'] ?? null;
    
            function tampilAlert($pesan) {
                echo "<script>alert('Pesan: $pesan');
                window.history.go(-1);</script>";
            }
    
            function kuadrat($bilangan) {
                if (!is_numeric($bilangan)) {
                    echo "<script>alert('Input harus berupa angka!');
                    window.history.go(-1);</script>";
                    return;
                }
                $kuadrat = pow($bilangan, 2);
                echo "<script>alert('Hasil $bilangan kuadrat = $kuadrat');
                window.history.go(-1);</script>";
            }
    
            function cGanGen($bilangan) { // Mengganti nama fungsi
                if (!is_numeric($bilangan)) {
                    echo "<script>alert('Input harus berupa angka!');
                    window.history.go(-1);</script>";
                    return;
                }
                if ($bilangan % 2 == 0) {
                    echo "<script>alert('Bilangan $bilangan adalah Genap');
                    window.history.go(-1);</script>";
                } else {
                    echo "<script>alert('Bilangan $bilangan adalah Ganjil');
                    window.history.go(-1);</script>";
                }
            }
    
            switch ($submit) {
                case "Tampilkan":
                    if (!empty($pesan)) {
                        tampilAlert($pesan);
                    } else {
                        echo "<script>alert('Pesan tidak boleh kosong!');
                        window.history.go(-1);</script>";
                    }
                    break;
                case "Kuadrat":
                    kuadrat($bilangan);
                    break;
                case "Cek Ganjil/Genap":
                    cGanGen($bilangan); // Memanggil fungsi dengan nama baru
                    break;
                default:
                    echo "<script>alert('Aksi tidak valid!');
                    window.history.go(-1);</script>";
                    break;
            }
        }
    ?>
    <HTML>
        <HEAD>
            <TITLE>Latihan Fungsi</TITLE>
        </HEAD>
        <BODY>
            <FORM METHOD="POST" ACTION="P2f.php">
                Tuliskan Pesan Anda: <INPUT TYPE="text" NAME="pesan">
                <INPUT TYPE="submit" name="submit" value="Tampilkan">
                <BR><HR>
                Tuliskan Bilangan: <INPUT TYPE="text" NAME="bilangan" size=3>
                <INPUT TYPE="submit" name="submit" value="Kuadrat">
                <INPUT TYPE="submit" name="submit" value="Cek Ganjil/Genap">
            </FORM>
        </BODY>
    </HTML>    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $submit = $_POST['submit'] ?? null;
            $pesan = $_POST['pesan'] ?? '';
            $bilangan = $_POST['bilangan'] ?? null;
    
            function tampilAlert($pesan) {
                echo "<script>alert('Pesan: $pesan');
                window.history.go(-1);</script>";
            }
    
            function kuadrat($bilangan) {
                if (!is_numeric($bilangan)) {
                    echo "<script>alert('Input harus berupa angka!');
                    window.history.go(-1);</script>";
                    return;
                }
                $kuadrat = pow($bilangan, 2);
                echo "<script>alert('Hasil $bilangan kuadrat = $kuadrat');
                window.history.go(-1);</script>";
            }
    
            function cGanGen($bilangan) { // Mengganti nama fungsi
                if (!is_numeric($bilangan)) {
                    echo "<script>alert('Input harus berupa angka!');
                    window.history.go(-1);</script>";
                    return;
                }
                if ($bilangan % 2 == 0) {
                    echo "<script>alert('Bilangan $bilangan adalah Genap');
                    window.history.go(-1);</script>";
                } else {
                    echo "<script>alert('Bilangan $bilangan adalah Ganjil');
                    window.history.go(-1);</script>";
                }
            }
    
            switch ($submit) {
                case "Tampilkan":
                    if (!empty($pesan)) {
                        tampilAlert($pesan);
                    } else {
                        echo "<script>alert('Pesan tidak boleh kosong!');
                        window.history.go(-1);</script>";
                    }
                    break;
                case "Kuadrat":
                    kuadrat($bilangan);
                    break;
                case "Cek Ganjil/Genap":
                    cGanGen($bilangan); // Memanggil fungsi dengan nama baru
                    break;
                default:
                    echo "<script>alert('Aksi tidak valid!');
                    window.history.go(-1);</script>";
                    break;
            }
        }
    ?>
    <HTML>
        <HEAD>
            <TITLE>Latihan Fungsi</TITLE>
        </HEAD>
        <BODY>
            <FORM METHOD="POST" ACTION="P2f.php">
                Tuliskan Pesan Anda: <INPUT TYPE="text" NAME="pesan">
                <INPUT TYPE="submit" name="submit" value="Tampilkan">
                <BR><HR>
                Tuliskan Bilangan: <INPUT TYPE="text" NAME="bilangan" size=3>
                <INPUT TYPE="submit" name="submit" value="Kuadrat">
                <INPUT TYPE="submit" name="submit" value="Cek Ganjil/Genap">
            </FORM>
        </BODY>
    </HTML>    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $submit = $_POST['submit'] ?? null;
            $pesan = $_POST['pesan'] ?? '';
            $bilangan = $_POST['bilangan'] ?? null;
    
            function tampilAlert($pesan) {
                echo "<script>alert('Pesan: $pesan');
                window.history.go(-1);</script>";
            }
    
            function kuadrat($bilangan) {
                if (!is_numeric($bilangan)) {
                    echo "<script>alert('Input harus berupa angka!');
                    window.history.go(-1);</script>";
                    return;
                }
                $kuadrat = pow($bilangan, 2);
                echo "<script>alert('Hasil $bilangan kuadrat = $kuadrat');
                window.history.go(-1);</script>";
            }
    
            function cGanGen($bilangan) { // Mengganti nama fungsi
                if (!is_numeric($bilangan)) {
                    echo "<script>alert('Input harus berupa angka!');
                    window.history.go(-1);</script>";
                    return;
                }
                if ($bilangan % 2 == 0) {
                    echo "<script>alert('Bilangan $bilangan adalah Genap');
                    window.history.go(-1);</script>";
                } else {
                    echo "<script>alert('Bilangan $bilangan adalah Ganjil');
                    window.history.go(-1);</script>";
                }
            }
    
            switch ($submit) {
                case "Tampilkan":
                    if (!empty($pesan)) {
                        tampilAlert($pesan);
                    } else {
                        echo "<script>alert('Pesan tidak boleh kosong!');
                        window.history.go(-1);</script>";
                    }
                    break;
                case "Kuadrat":
                    kuadrat($bilangan);
                    break;
                case "Cek Ganjil/Genap":
                    cGanGen($bilangan); // Memanggil fungsi dengan nama baru
                    break;
                default:
                    echo "<script>alert('Aksi tidak valid!');
                    window.history.go(-1);</script>";
                    break;
            }
        }
    ?>
    <HTML>
        <HEAD>
            <TITLE>Latihan Fungsi</TITLE>
        </HEAD>
        <BODY>
            <FORM METHOD="POST" ACTION="P2f.php">
                Tuliskan Pesan Anda: <INPUT TYPE="text" NAME="pesan">
                <INPUT TYPE="submit" name="submit" value="Tampilkan">
                <BR><HR>
                Tuliskan Bilangan: <INPUT TYPE="text" NAME="bilangan" size=3>
                <INPUT TYPE="submit" name="submit" value="Kuadrat">
                <INPUT TYPE="submit" name="submit" value="Cek Ganjil/Genap">
            </FORM>
        </BODY>
    </HTML>
?>
<HTML>
    <HEAD>
        <TITLE>Latihan Fungsi</TITLE>
    </HEAD>
    <BODY>
        <FORM METHOD="POST" ACTION="P2f.php">
            Tuliskan Pesan Anda: <INPUT TYPE="text" NAME="pesan">
            <INPUT TYPE="submit" name="submit" value="Tampilkan">
            <BR><HR>
            Tuliskan Bilangan: <INPUT TYPE="text" NAME="bilangan" size=3>
            <INPUT TYPE="submit" name="submit" value="Kuadrat">
        </FORM>
    </BODY>
</HTML>