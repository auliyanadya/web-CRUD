<?php
require 'connection.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mahasiswa SET npm=?, nama=?, jurusan=? WHERE id=?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$npm, $nama, $jurusan, $id])) {
        header("Location: daftar.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sistem Informasi Mahasiswa</h1>
    </header>
    <div class="container">
    <h2>✏️ Edit Mahasiswa</h2>
    <a class="button small" href="daftar.php">Kembali</a>
    <form method="POST">
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" value="<?= $data['npm']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama']; ?>">

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?= $data['jurusan']; ?>">

        <button type="submit" class="button">Update</button>
    </form>
    </div>
    <footer>© 2026 Kampus XYZ. All rights reserved.</footer>
</body>
</html>