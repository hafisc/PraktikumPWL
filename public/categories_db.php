<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=Filament2026', 'root', '');

echo "<style>body{font-family:sans-serif;}</style>";
echo "<h2>Struktur Tabel Categories</h2><table border='1' cellspacing='0' cellpadding='5'><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
$stmt = $pdo->query('DESCRIBE categories');
while ($row = $stmt->fetch()) {
    echo "<tr><td>{$row['Field']}</td><td>{$row['Type']}</td><td>{$row['Null']}</td><td>{$row['Key']}</td><td>{$row['Default']}</td><td>{$row['Extra']}</td></tr>";
}
echo "</table>";

echo "<h2>Struktur Tabel Posts</h2><table border='1' cellspacing='0' cellpadding='5'><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
$stmt2 = $pdo->query('DESCRIBE posts');
while ($row = $stmt2->fetch()) {
    echo "<tr><td>{$row['Field']}</td><td>{$row['Type']}</td><td>{$row['Null']}</td><td>{$row['Key']}</td><td>{$row['Default']}</td><td>{$row['Extra']}</td></tr>";
}
echo "</table>";
?>
