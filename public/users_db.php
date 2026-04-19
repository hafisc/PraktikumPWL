<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "Filament2026");
if ($mysqli->connect_error) die("Connection failed: " . $mysqli->connect_error);
$result = $mysqli->query("SELECT id, name, email, created_at FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial; padding: 20px; background: #fff; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #f4f4f4; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>Data User (Tabel users)</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Created At</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
