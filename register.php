<?php
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <div class="brand">Sejarah Game Populer</div>
    <nav><a href="index.php">Home</a> <a href="login.php">Login</a></nav>
  </header>

  <main class="form-container">
    <form class="card card-form" action="register-proses.php" method="POST">
      <h2>Register</h2>
      <label>Nama Lengkap</label>
      <input type="text" name="nama" required>
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button class="btn" type="submit" name="daftar">Daftar Sekarang</button>
    </form>
  </main>
</body>
</html>

