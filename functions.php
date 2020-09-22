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
    $foto = htmlspecialchars($data["Foto"]);

    $query = "INSERT INTO test VALUES
    ('','$nama','$alamat','$hobi','$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM test WHERE ID = $id");

    return mysqli_affected_rows($conn);
}
