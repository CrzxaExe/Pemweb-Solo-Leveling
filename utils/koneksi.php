<?php
$server = "localhost";
$username = "root";
$password = "CrzxaExe3#0312";
$dbname = "wiki_solo_leveling";

try {
    $dsn = "mysql:host=$server;dbname=$dbname;charset=UTF8mb4";
    $koneksi = new PDO($dsn, $username, $password);

    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $koneksi;
} catch (PDOException $e) {
    echo "Error on connection: ".$e->getMessage();
}