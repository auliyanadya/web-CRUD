<?php

$host = "localhost";
$user = "root";    // user default Laragon
$pass = "";        // password default Laragon kosong
$db   = "kampus";  // pastikan nama database sama di phpMyAdmin / MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
?>