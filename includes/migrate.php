<?php
require_once __DIR__ . '/db.php';

$migrationsDir = __DIR__ . '/../migrations';
$files = glob("$migrationsDir/*.sql");
sort($files);

foreach ($files as $file) {
    $sql = file_get_contents($file);
    echo "🔄 Применяю миграцию: " . basename($file) . "\n";
    $pdo->exec($sql);
    echo "✅ Успешно\n";
}
echo "🎉 Все миграции применены!\n";
