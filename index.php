<?php
// DB Connection
require 'functions.php';

// Get Data from test Table
$data = query("SELECT * FROM test");

// Button Cari Clicked
if (isset($_POST["cari"])) {
    $data = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BE Practice</title>
</head>

<body>
    <h1>Tabel Data</h1>

    <a href="insert.php">Tambah Data</a> <br> <br>

    <form action="" method="POST">
        <input type="text" name="keyword" size="30" placeholder="Masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari Data</button>
        <br> <br>
    </form>

    <table border="1" cellpadding='10' cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
            <th>Foto</th>
            <th>Atur</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $d["Nama"]; ?></td>
                <td><?= $d["Alamat"]; ?></td>
                <td><?= $d["Hobi"]; ?></td>
                <td><img src="img/<?= $d["Foto"]; ?>" width="60"></td>
                <td><a href="update.php?ID=<?= $d["ID"]; ?>">Ubah</a> | <a href="delete.php?ID=<?= $d["ID"]; ?>" onclick="return confirm('Data yakin akan dihapus?');">Hapus</a></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>

</html>