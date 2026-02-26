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
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Edit Mahasiswa</h2>
<form method="POST">
    NPM:<br>
    <input type="text" name="npm" value="<?= $data['npm']; ?>"><br>
    Nama:<br>
    <input type="text" name="nama" value="<?= $data['nama']; ?>"><br>
    Jurusan:<br>
    <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>"><br><br>
    <button type="submit">Update</button>
</form>
</body>
</html>