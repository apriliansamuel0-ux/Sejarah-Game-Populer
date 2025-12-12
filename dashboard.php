<?php
// Mulai sesi (HARUS BARIS PERTAMA)
session_start();

include 'koneksi.php';

// Proteksi Halaman Admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
    header("Location: login.php"); // Arahkan ke login.php di root
    exit;
}

// === START WIDGET QUERY (Tugas Praktikum) ===
// Query untuk menghitung total game
$q_count = mysqli_query($koneksi, "SELECT COUNT(id_game) AS total_game FROM games");
$data_count = mysqli_fetch_assoc($q_count);
$total_games = $data_count['total_game'];
// === END WIDGET QUERY ===

// Ambil semua data game untuk tabel
$q = mysqli_query($koneksi, "SELECT * FROM games ORDER BY id_game DESC");

if (!$q) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Kelola Game</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS Widget Tambahan */
        .widget-container {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .widget {
            background-color: #2b2b3f;
            padding: 20px;
            border-radius: 8px;
            color: #fff;
            flex: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .widget h3 {
            margin: 0 0 10px 0;
            font-size: 1.5em;
        }

        .widget p {
            margin: 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        /* Style untuk tombol print */
        .btn-print {
            background-color: #ffc107; /* Kuning */
            color: #1e1e2d;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
            margin-top: 10px; /* Tambahan margin agar tidak terlalu dekat dengan widget */
        }

        /* Style untuk tombol delete yang diubah menjadi button */
        .btn-delete {
            background-color: red;
            border: none;
            cursor: pointer;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9em;
        }

        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        .crud-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #1e1e2d;
            color: #f0f0f0;
        }

        .crud-table th,
        .crud-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #333;
        }

        .crud-table th {
            background-color: #2b2b3f;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        .crud-table tr:hover {
            background-color: #252538;
        }

        .crud-table .action-buttons {
            display: flex;
            gap: 8px;
        }

        .crud-table img {
            width: 50px;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<header class="site-header">
    <div class="brand">GamePopuler Admin</div>
    <nav>
        <a href="index.php">Home Publik</a>
        <a href="game/add_game.php" class="btn">Tambah Game Baru</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">

    <div class="hero">
        <h1>Kelola Daftar Game</h1>
        <p>Tabel administrasi untuk mengelola data game (CRUD).</p>
    </div>

    <div class="widget-container">
        <div class="widget">
            <h3>Total Game Tercatat</h3>
            <p><?= $total_games; ?></p>
        </div>
    </div>

    <a href="game/game-cetak.php" target="_blank" class="btn-print">Cetak Laporan Game (PDF)</a>

    <div class="table-container">
        <table class="crud-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Game</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor = 1;
                while($g = mysqli_fetch_assoc($q)) : 
                ?>
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td>
                            <img src="<?= $g['gambar']; ?>" alt="<?= $g['nama_game']; ?>">
                        </td>
                        <td><?= $g['nama_game']; ?></td>
                        <td><?= substr($g['deskripsi'], 0, 80) . '...'; ?></td>
                        <td class="action-buttons">
                            <a class="btn-edit" href="game/edit_game.php?id=<?= $g['id_game']; ?>">Edit</a>
                            <button class="btn-delete" onclick="deleteGame(<?= $g['id_game']; ?>)">
                                Hapus
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>

                <?php if (mysqli_num_rows($q) == 0): ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Belum ada data game yang ditambahkan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<footer class="site-footer">
    Dibuat oleh Sam
</footer>

<script>
    function deleteGame(idGame) {
        if (confirm('Apakah Anda yakin ingin menghapus game ini secara permanen?')) {

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'game/game-proses.php';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id_game';
            idInput.value = idGame;

            const actionInput = document.createElement('input');
            actionInput.type = 'hidden';
            actionInput.name = 'hapus_game';
            actionInput.value = '1';

            form.appendChild(idInput);
            form.appendChild(actionInput);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

</body>
</html>
