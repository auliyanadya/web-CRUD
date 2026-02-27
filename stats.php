<?php
require 'connection.php';

// Get total mahasiswa
$stmt_mhs = $pdo->query("SELECT COUNT(*) as total FROM mahasiswa");
$total_mhs = $stmt_mhs->fetch(PDO::FETCH_ASSOC)['total'];

// Get total jurusan (distinct)
$stmt_jur = $pdo->query("SELECT COUNT(DISTINCT jurusan) as total FROM mahasiswa");
$total_jur = $stmt_jur->fetch(PDO::FETCH_ASSOC)['total'];

// Get jurusan distribution
$stmt_dist = $pdo->query("SELECT jurusan, COUNT(*) as jumlah FROM mahasiswa GROUP BY jurusan ORDER BY jumlah DESC");
$jurusan_dist = $stmt_dist->fetchAll(PDO::FETCH_ASSOC);

// Calculate max for bar chart scaling
$max_count = $total_mhs > 0 ? max(array_map(function($item) { return $item['jumlah']; }, $jurusan_dist)) : 1;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistik Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Statistik Mahasiswa</h1>
    </header>
    <div class="container">
    <div class="page-header">
        <h2>📊 Dashboard Statistik</h2>
    </div>
    <div class="page-actions-bottom">
        <a class="button home-btn" href="daftar.php">🏠 Kembali</a>
    </div>

    <!-- Stats Overview -->
    <div class="stats-overview">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-number" data-count="<?= $total_mhs ?>">0</div>
            <div class="stat-label">Total Mahasiswa</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">🏢</div>
            <div class="stat-number" data-count="<?= $total_jur ?>">0</div>
            <div class="stat-label">Total Jurusan</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📈</div>
            <div class="stat-number"><?= $total_jur > 0 ? round($total_mhs / $total_jur) : 0 ?></div>
            <div class="stat-label">Rata-rata per Jurusan</div>
        </div>
    </div>

    <!-- Distribution Chart -->
    <?php if (count($jurusan_dist) > 0): ?>
    <div class="chart-section">
        <h3>📈 Distribusi Mahasiswa per Jurusan</h3>
        <div class="bar-chart">
            <?php foreach ($jurusan_dist as $item): ?>
            <div class="chart-item">
                <div class="chart-label"><?= htmlspecialchars($item['jurusan']) ?></div>
                <div class="chart-bar-container">
                    <div class="chart-bar" style="width: <?= ($item['jumlah'] / $max_count) * 100 ?>%">
                        <span class="chart-value"><?= $item['jumlah'] ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Pie Chart Visual -->
    <div class="chart-section pie-section">
        <h3>📊 Grafik Batang Mahasiswa per Jurusan</h3>
        <div class="vertical-bar-chart">
            <?php 
            $max_height = 300;
            foreach ($jurusan_dist as $item): 
                $height = ($item['jumlah'] / $max_count) * $max_height;
            ?>
            <div class="vertical-bar-item">
                <div class="bar-wrapper">
                    <div class="vertical-bar" style="height: <?= $height ?>px">
                        <span class="bar-label-top"><?= $item['jumlah'] ?></span>
                    </div>
                </div>
                <div class="vertical-bar-label"><?= htmlspecialchars($item['jurusan']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="empty-state">
        <p>Belum ada data mahasiswa untuk ditampilkan.</p>
        <a class="button" href="tambah.php">Tambah Data Pertama</a>
    </div>
    <?php endif; ?>

    </div>
    <footer>© 2026 Universitas Siliwangi. All rights reserved.</footer>

    <script>
        // Counter animation for stats
        document.addEventListener('DOMContentLoaded', function() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            statNumbers.forEach(stat => {
                const targetCount = parseInt(stat.getAttribute('data-count'));
                
                if (targetCount > 0) {
                    let currentCount = 0;
                    const increment = Math.ceil(targetCount / 30);
                    
                    const counter = setInterval(() => {
                        currentCount += increment;
                        if (currentCount >= targetCount) {
                            stat.textContent = targetCount;
                            clearInterval(counter);
                        } else {
                            stat.textContent = currentCount;
                        }
                    }, 50);
                }
            });
        });
    </script>
</body>
</html>
