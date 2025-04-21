<!DOCTYPE html>
<html lang="ja">

<body>
    <?php if (isset($_GET['error'])): ?>
        <p class="error">
            <?php
            if ($_GET['error'] === 'invalid_id') echo 'ERROR：不正なIDが入力されました。';
            if ($_GET['error'] === 'not_found') echo 'ERROR：指定されたToDoは見つかりませんでした。URLに誤りがあるか、既に削除されたToDoです。';
            ?>
        </p>
    <?php endif; ?>


    <meta charset="UTF-8">
    <h1>ToDoリスト</h1>
    <h3>ToDo数：<?= $todoCount ?> 件</h3>
    <title>ToDoリスト</title>
    <a href="/php-0416-training/views/create.php">
        <button>新規作成</button>
    </a>
</body>

<?php foreach ($todos as $todo): ?>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px; border-bottom: 1px solid #ccc;">
        <div>
            <h3>タイトル：<?= htmlspecialchars($todo['title']) ?></h3>
            <p>内容：<?= nl2br(htmlspecialchars($todo['content'])) ?></p>
            <p>作成日時：<?= nl2br(htmlspecialchars($todo['created_at'])) ?></p>
            <p>更新日時：<?= nl2br(htmlspecialchars($todo['updated_at'])) ?></p>
        </div>
        <div>
            <a href="/php-0416-training/controllers/EditController.php?id=<?= $todo['id'] ?>">
                <button>編集</button>
            </a>
            <form action="/php-0416-training/controllers/DeleteController.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                <button type="submit" onclick="return confirm('このToDoを削除します。本当によろしいですか？')">削除</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>


</html>