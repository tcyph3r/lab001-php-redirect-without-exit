<?php
require_once 'includes/session.php';
require_once 'includes/conn.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <style>
    body { font-family: Arial, sans-serif; background: #1a1a2e; color: #eee; padding: 20px; }
    h2 { color: #e94560; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th { background: #16213e; padding: 10px; text-align: left; }
    td { padding: 10px; border-bottom: 1px solid #0f3460; }
    tr:hover { background: #0f3460; }
    .badge { background: #e94560; padding: 3px 8px; border-radius: 4px; font-size: 12px; }
    .header { display: flex; justify-content: space-between; align-items: center; }
    a.logout { color: #e94560; text-decoration: none; font-size: 14px; }
  </style>
</head>
<body>
  <div class="header">
    <h2>Admin Panel — Registered Records</h2>
    <a class="logout" href="/logout.php">Logout</a>
  </div>
  <p>Total Records: <span class="badge">
    <?php
      $count = $conn->query("SELECT COUNT(*) as total FROM records");
      echo $count->fetch_assoc()['total'];
    ?>
  </span></p>
  <table>
    <tr>
      <th>ID</th>
      <th>Full Name</th>
      <th>Phone</th>
      <th>Reference</th>
      <th>Branch</th>
    </tr>
    <?php
      $result = $conn->query("SELECT * FROM records");
      while ($row = $result->fetch_assoc()):
    ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['full_name'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><?= $row['reference'] ?></td>
      <td><?= $row['branch'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
