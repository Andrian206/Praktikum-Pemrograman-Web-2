<?php
    include 'Koneksi.php';

    $message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile'])) {
        $uploadir = 'data/';
        $fileName = $_FILES['userfile']['name'];
        $tmpName = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];

        $query = "SELECT count(*) as jum FROM upload WHERE name = '$fileName'";
        $hasil = mysqli_query($db, $query);
        $data = mysqli_fetch_array($hasil);

        if ($data['jum'] > 0) {
            $query = "UPDATE upload SET size = '$fileSize', type = '$fileType' WHERE name = '$fileName'";
            mysqli_query($db, $query);
        } else {
            $query = "INSERT INTO upload (name, size, type) VALUES ('$fileName', '$fileSize', '$fileType')";
            mysqli_query($db, $query);
        }

        $uploadfile = $uploadir . $fileName;
        if (move_uploaded_file($tmpName, $uploadfile)) {
            echo "<script>alert('File berhasil diupload!');</script>";
        } else {
            echo "<script>alert('File gagal diupload!');</script>";
        }
    }

    if (isset($_GET['download'])) {
        $id = $_GET['download'];
        $query = "SELECT * FROM upload WHERE id = '$id'";
        $hasil = mysqli_query($db, $query);
        $data = mysqli_fetch_array($hasil);

        header('Content-Disposition: attachment; filename="' . $data['name'] . '"');
        header("Content-length: {$data['size']}");
        header("Content-type: {$data['type']}");
        readfile("data/" . $data['name']);
        exit;
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "SELECT * FROM upload WHERE id = '$id'";
        $hasil = mysqli_query($db, $query);
        $data = mysqli_fetch_array($hasil);
        $filePath = "data/" . $data['name'];

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        mysqli_query($db, "DELETE FROM upload WHERE id = '$id'");
        echo "<script>alert('File berhasil dihapus!'); window.location.href = '".$_SERVER['PHP_SELF']."';</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload dan Download File</title>
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
                background: rgba(255, 255, 255, 0.95);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0px 4px 10px rgba(14, 14, 14, 0.2);
                width: 600px;
                overflow-y: auto;
                max-height: 95vh;
            }
            h4 {
                text-align: center;
                margin-bottom: 15px;
                color: black;
            }
            input[type="file"] {
                width: 100%;
                margin-bottom: 10px;
            }
            input[type="submit"] {
                background: rgb(0, 85, 255);
                color: white;
                border: none;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
                font-size: 13px;
            }
            input[type="submit"]:hover {
                background: rgb(21, 99, 189);
            }
            .file-item {
                background-color: #f4f4f4;
                padding: 8px;
                margin-bottom: 12px;
                border-radius: 5px;
                font-size: 13px;
            }
            .file-item a {
                text-decoration: none;
                color: #0066cc;
                margin-right: 10px;
            }
            .file-item a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h4>Upload File</h4>
            <form enctype="multipart/form-data" method="post" action="">
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input name="userfile" type="file" required />
                <input type="submit" value="Upload">
            </form>
            <hr>
            <br><h4>Daftar File</h4>
            <?php
                $query = "SELECT * FROM upload ORDER BY id DESC";
                $hasil = mysqli_query($db, $query);
                while ($data = mysqli_fetch_array($hasil)) {
                    $filePath = "data/" . $data['name'];
                    echo "<div class='file-item'>
                            <strong>Nama:</strong> {$data['name']}<br>
                            <strong>Ukuran:</strong> {$data['size']} bytes<br>
                            <strong>Tipe:</strong> {$data['type']}<br>
                            <a href='$filePath' target='_blank'>Lihat</a>
                            <a href='?download={$data['id']}'>Download</a>
                            <a href='?delete={$data['id']}' onclick=\"return confirm('Yakin ingin menghapus file ini?');\">Hapus</a>
                        </div>";
                }
            ?>
        </div>
    </body>
</html>
