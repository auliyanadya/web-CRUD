<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$npm, $nama, $jurusan])) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Tambah Mahasiswa</h2>
<form method="POST">
    NPM:<br>
    <input type="text" name="npm" required><br>
    Nama:<br>
    <input type="text" name="nama" required><br>
    Jurusan:<br>
    <input type="text" name="jurusan" required><br><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>