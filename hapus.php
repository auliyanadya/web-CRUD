<?php
require 'connection.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE id=?");

if ($stmt->execute([$id])) {
    header("Location: daftar.php");
    exit;
}
?>