<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';

$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 5;
$offset = ($page - 1) * $limit;

$stmt = $pdo->query("SELECT COUNT(*) FROM articles");
$total = $stmt->fetchColumn();
$totalPages = ceil($total / $limit);

$stmt = $pdo->prepare("SELECT * FROM articles ORDER BY created_at DESC LIMIT ? OFFSET ?");
$stmt->execute([$limit, $offset]);
$articles = $stmt->fetchAll();
?>
<main>
    <h1>📚 Статьи</h1>
    <a href="pages/add_article.php" class="btn">➕ Добавить статью</a>
    <div class="articles-list">
        <?php foreach ($articles as $art): ?>
            <article class="card">
                <h2><?= htmlspecialchars($art['title']) ?></h2>
                <p><?= nl2br(htmlspecialchars($art['body'])) ?></p>
                <small>📅 <?= $art['created_at'] ?></small>
            </article>
        <?php endforeach; ?>
    </div>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
