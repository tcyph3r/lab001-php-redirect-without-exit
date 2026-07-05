<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        $_SESSION['user'] = 'admin';
        header('Location: /admin/records.php');
        exit();
    }
    $error = 'Invalid credentials';
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body { font-family: Arial, sans-serif; background: #1a1a2e; display: flex;
           justify-content: center; align-items: center; height: 100vh; margin: 0; }
    .card { background: #16213e; padding: 40px; border-radius: 8px; width: 320px; }
    h2 { color: #e94560; margin-bottom: 20px; }
    input { width: 100%; padding: 10px; margin: 8px 0; background: #0f3460;
            border: none; border-radius: 4px; color: #eee; box-sizing: border-box; }
    button { width: 100%; padding: 10px; background: #e94560; border: none;
             border-radius: 4px; color: white; cursor: pointer; margin-top: 10px; }
    .error { color: #e94560; font-size: 14px; margin-top: 10px; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Admin Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
      <?php endif; ?>
    </form>
  </div>
</body>
</html>
