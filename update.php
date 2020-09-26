<?php
require 'functions.php';

// Get Data in URL
$id = $_GET["ID"];

// Query Data Based on ID
$dataID = query("SELECT * FROM test WHERE ID = $id")[0];

// Submit Button Pressed Check
if (isset($_POST["submit"])) {

    // Data Add Check
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "            
            <script>
                alert('Data Gagal Diubah!');
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
    <h1>Ubah Data</h1>

    <form action="" method="POST">
        <input type="hidden" name="ID" value="<?= $dataID["ID"]; ?>">
        <ul>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" value="<?= $dataID["Nama"]; ?>" required>
            </li>
            <li>
                <label for="Alamat">Alamat :</label>
                <input type="text" name="Alamat" id="Alamat" value="<?= $dataID["Alamat"]; ?>" required>
            </li>
            <li>
                <label for="Hobi">Hobi :</label>
                <input type="text" name="Hobi" id="Hobi" value="<?= $dataID["Hobi"]; ?>" required>
            </li>
            <li>
                <label for="Foto">Foto :</label>
                <input type="text" name="Foto" id="Foto" value="<?= $dataID["Foto"]; ?>" required>
            </li>
            <button type="submit" name="submit">Ubah</button>
        </ul>

    </form>
</body>

</html>