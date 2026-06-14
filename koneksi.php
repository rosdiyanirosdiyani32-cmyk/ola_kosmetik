<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "db_kosmetik";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

?>