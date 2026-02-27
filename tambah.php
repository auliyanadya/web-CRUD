<<<<<<< HEAD
<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$npm, $nama, $jurusan])) {
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
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sistem Informasi Mahasiswa</h1>
    </header>
    <div class="container">
    <h2>➕ Tambah Mahasiswa</h2>
    <a class="button small" href="daftar.php">Kembali</a>
    <form method="POST">
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>

        <button type="submit" class="button">Simpan</button>
    </form>
    </div>
    <footer>© 2026 Kampus XYZ. All rights reserved.</footer>
</body>
=======
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
>>>>>>> 0f2bbcf1f784b7bef76356e75f595f2e799767c6
</html>