<?php include '../includes/header.php'; ?>
<main>
    <h1>Контакты</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div style="background:#d4edda; padding:10px; border-radius:5px; margin-bottom:15px;">
            ✅ Сообщение отправлено! Спасибо, <?= htmlspecialchars($_POST['name']) ?>.
        </div>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="name" placeholder="Ваше имя" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="message" rows="4" placeholder="Сообщение" required></textarea>
        <button type="submit" style="background:#3498db; color:white; border:none; cursor:pointer;">Отправить</button>
    </form>
</main>
<?php include '../includes/footer.php'; ?>
