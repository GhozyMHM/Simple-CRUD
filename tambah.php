<?php
require 'functions.php';
if (isset($_POST["submit"])) {

    // Data Add Check
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "            
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" required>
            </li>
            <li>
                <label for="Alamat">Alamat :</label>
                <input type="text" name="Alamat" id="Alamat" required>
            </li>
            <li>
                <label for="Hobi">Hobi :</label>
                <input type="text" name="Hobi" id="Hobi" required>
            </li>
            <li>
                <label for="Foto">Foto :</label>
                <input type="text" name="Foto" id="Foto" required>
            </li>
            <button type="submit" name="submit">Tambah</button>
        </ul>

    </form>
</body>

</html>