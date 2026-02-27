<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Portal Mahasiswa</h1>
    </header>
    <div class="container welcome">
        <div class="hero">
            <div class="hero-icon">🎓</div>
            <h1>Portal Mahasiswa</h1>
            <p>Selamat datang di sistem informasi mahasiswa kampus kami. Kelola data mahasiswa dengan mudah dan cepat.</p>
            <a class="button hero-btn" href="daftar.php">Mulai Sekarang</a>
        </div>

        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">📋</div>
                <h3>Lihat Data</h3>
                <p>Tampilkan semua data mahasiswa dalam satu tampilan yang rapi dan terorganisir.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">➕</div>
                <h3>Tambah Data</h3>
                <p>Tambahkan data mahasiswa baru dengan form yang mudah diisi dan user-friendly.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">✏️</div>
                <h3>Edit Data</h3>
                <p>Ubah informasi mahasiswa yang sudah terdaftar dengan cepat dan aman.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🗑️</div>
                <h3>Hapus Data</h3>
                <p>Hapus data mahasiswa yang tidak diperlukan dengan mudah dan terverifikasi.</p>
            </div>
        </div>
    </div>
    <footer>© 2026 Universitas Siliwangi. All rights reserved.</footer>
</body>
=======
<?php
require 'connection.php';

$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <a href="tambah.php">Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="10">
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
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
>>>>>>> 0f2bbcf1f784b7bef76356e75f595f2e799767c6
</html>