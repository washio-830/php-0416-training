<h1>ToDo編集</h1>

<form action="/php-0416-training/controllers/UpdateController.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($todo['id']) ?>">

    <label>タイトル：</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($todo['title']) ?>" required><br><br>

    <label>内容：</label><br>
    <textarea name="content" rows="4" cols="40" required><?= htmlspecialchars($todo['content']) ?></textarea><br><br>

    <input type="submit" value="更新">
</form>