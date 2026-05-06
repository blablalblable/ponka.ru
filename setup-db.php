<?php
if (php_sapi_name() !== 'cli') {
    exit('⚠️ Запускайте миграции только через CLI: php setup-db.php');
}
require_once __DIR__ . '/includes/migrate.php';
