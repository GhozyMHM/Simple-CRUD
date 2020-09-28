<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "be_practice";

// Create connection
$conn = mysqli_connect($server, $user, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["Nama"]);
    $alamat = htmlspecialchars($data["Alamat"]);
    $hobi = htmlspecialchars($data["Hobi"]);

    // Upload Picture
    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO test VALUES
    ('','$nama','$alamat','$hobi','$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFoto = $_FILES['Foto']['name'];
    $ukuranFoto = $_FILES['Foto']['size'];
    $error = $_FILES['Foto']['error'];
    $tmpName = $_FILES['Foto']['tmp_name'];

    // Picture Uploaded Check
    if ($error === 4) {
        echo " <script>
                    alert('Pilih gambar terlebih dahulu!')
                </script>";
        return false;
    }

    // Extension Picture Allowed Check
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFoto);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "  <script>
                    alert('Hanya dapat mengupload file gambar!')
                </script>";
        return false;
    }

    // Picture's Size Limit Check

    // Generate Picture's Name
    $namaFotoBaru = uniqid();
    $namaFotoBaru .= '.';
    $namaFotoBaru .= $ekstensiFoto;

    if ($ukuranFoto > 5000000) {
        echo "  <script>
                    alert('Maksimal ukuran file yaitu 5 MB!')
                </script>";
        return false;
    }

    // Picture ready to upload
    move_uploaded_file($tmpName, 'img/' . $namaFotoBaru);

    return $namaFotoBaru;
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM test WHERE ID = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["ID"];
    $nama = htmlspecialchars($data["Nama"]);
    $alamat = htmlspecialchars($data["Alamat"]);
    $hobi = htmlspecialchars($data["Hobi"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    // Choose New Photo Check
    if ($_FILES['Foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE test SET 
                Nama = '$nama',
                Alamat = '$alamat',
                Hobi = '$hobi',
                Foto = '$foto'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM test
                WHERE Nama LIKE '%$keyword%'
                OR Alamat LIKE '%$keyword%'
                OR Hobi LIKE '%$keyword%'
                ";

    return query($query);
}
