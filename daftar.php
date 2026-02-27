<?php
require 'connection.php';

$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sistem Informasi Mahasiswa</h1>
    </header>
    <div class="container">
    <div class="page-header">
        <h2>📋 Daftar Mahasiswa</h2>
    </div>
    <div class="page-actions-bottom">
        <a class="button home-btn" href="index.php">🏠 Home</a>
        <a class="button add" href="tambah.php">Tambah Data</a>
        <a class="button stats-btn" href="stats.php">📊 Statistik</a>
    </div>

    <table class="data-table">
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; foreach($mahasiswa as $row): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['npm']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td>
                <a class="button small edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                <a class="button small delete" href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <footer>© 2026 Universitas Siliwangi. All rights reserved.</footer>
</body>
</html>