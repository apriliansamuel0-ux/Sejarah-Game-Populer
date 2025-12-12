
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <div class="brand">Sejarah Game Populer</div>
    <nav><a href="index.php">Home</a> <a href="register.php">Register</a></nav>
  </header>

  <main class="form-container">
    <form class="card card-form" action="login-proses.php" method="POST">
      <h2>Login</h2>
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button class="btn" type="submit">Login</button>
    </form>
  </main>
</body>
</html>

