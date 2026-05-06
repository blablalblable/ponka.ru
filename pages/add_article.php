<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $body = trim($_POST['body'] ?? '');
    
    if ($title && $body) {
        $stmt = $pdo->prepare("INSERT INTO articles (title, body) VALUES (?, ?)");
        $stmt->execute([$title, $body]);
        header("Location: ../articles.php?added=1");
        exit;
    }
}
?>
<main>
    <h1>✏️ Новая статья</h1>
    <form method="post" class="form">
        <input type="text" name="title" placeholder="Заголовок" required>
        <textarea name="body" rows="5" placeholder="Текст статьи" required></textarea>
        <button type="submit" class="btn">💾 Опубликовать</button>
    </form>
</main>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
