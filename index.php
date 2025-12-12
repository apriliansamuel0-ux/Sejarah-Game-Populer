<?php
include 'koneksi.php';

$q = mysqli_query($koneksi, "SELECT * FROM games");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Game Populer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="site-header">
    <div class="brand">GamePopuler</div>
    <nav>
        <a href="#">Home</a>
        <a href="dashboard.php">Data Game</a>
        <a href="game/add_game.php">Tambah Data</a>
    </nav>
</header>

<div class="container">

    <div class="hero">
        <h1>Daftar Game</h1>
    </div>

    <div class="game-grid">

        <?php while($g = mysqli_fetch_assoc($q)) : ?>
            <div class="card">
<img src="<?= $g['gambar']; ?>" alt="<?= $g['nama_game']; ?>">
                <h3><?= $g['nama_game']; ?></h3>
                <p><?= $g['deskripsi']; ?></p>
            </div>
        <?php endwhile; ?>

    </div>

</div>

<footer class="site-footer">
    Dibuat oleh Sam
</footer>

</body>
</html>