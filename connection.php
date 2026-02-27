<<<<<<< HEAD
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
=======
<?php

$host = 'localhost';
$dbname = 'kampus';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
>>>>>>> 0f2bbcf1f784b7bef76356e75f595f2e799767c6
?>