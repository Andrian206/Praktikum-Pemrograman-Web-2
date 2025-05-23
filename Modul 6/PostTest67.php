<!DOCTYPE html>
<html>
    <head>
        <title>Form Upload</title>
        <style>
            body {
                display: flex;
                min-height: 100vh;
                align-items: center;
                justify-content: center;
                margin: 0;
                background: #f5f5f5;
            }
            .container {
                background: #fff;
                padding: 32px 24px;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                text-align: center;
            }
        </style>
        <?php if (isset($_GET['success']) && isset($_GET['filename']) && isset($_GET['filetype'])): ?>
            <script>
                alert('Upload Berhasil!\nNama file: <?php echo htmlspecialchars($_GET['filename']); ?>\nTipe file: <?php echo htmlspecialchars($_GET['filetype']); ?>');
            </script>
        <?php elseif (isset($_GET['error'])): ?>
            <script>alert('Upload Gagal!');</script>
        <?php endif; ?>
    </head>
    <body>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <label>Pilih file untuk diupload:</label><br><br>
                <input type="file" name="file_upload" required><br><br>
                <label>Tipe file:</label><br>
                <input type="text" name="tipe_file" required><br><br>
                <button type="submit" name="submit">Upload</button>
            </form>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $filename = basename($_FILES["file_upload"]["name"]);
            $filetype = isset($_POST['tipe_file']) ? $_POST['tipe_file'] : '';
            $target_file = $target_dir . $filename;
            if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
                header("Location: ?success=1&filename=" . urlencode($filename) . "&filetype=" . urlencode($filetype));
                exit;
            } else {
                header("Location: ?error=1");
                exit;
            }
        }
        ?>
    </body>
</html>