<?php
$menuItems = [
    '/' => 'Главная',
    '/pages/about.php' => 'О нас',
    '/pages/contact.php' => 'Контакты'
];
$currentUri = $_SERVER['REQUEST_URI'];
?>
<header style="background:#333; color:white; padding:15px 0;">
    <nav style="max-width:800px; margin:auto; display:flex; gap:20px;">
        <?php foreach ($menuItems as $url => $title): 
            $active = ($currentUri === $url || ($url === '/' && $currentUri === '/index.php')) ? 'active' : '';
        ?>
            <a href="<?= $url ?>" class="<?= $active ?>" style="color:white; text-decoration:none;">
                <?= $title ?>
            </a>
        <?php endforeach; ?>
    </nav>
</header>
