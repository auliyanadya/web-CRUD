<<<<<<< HEAD
<?php
require 'connection.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE id=?");

if ($stmt->execute([$id])) {
    header("Location: daftar.php");
    exit;
}
=======
<?php
require 'connection.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE id=?");

if ($stmt->execute([$id])) {
    header("Location: index.php");
    exit;
}
>>>>>>> 0f2bbcf1f784b7bef76356e75f595f2e799767c6
?>