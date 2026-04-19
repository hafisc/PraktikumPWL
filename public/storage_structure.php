<?php
echo "<style>body{font-family:sans-serif;}</style>";
echo "<h2>Struktur Folder Storage (storage/app/public/post)</h2>";
$dir = __DIR__ . '/storage/post';
if (is_dir($dir)) {
    echo "<ul>";
    $files = scandir($dir);
    foreach($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "<li>📄 $file</li>";
        }
    }
    echo "</ul>";
} else {
    echo "Directory not found or empty.";
}
?>
