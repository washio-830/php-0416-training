<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <?php if (isset($_GET['error'])): ?>
        <p class="error">
            <?php
            if ($_GET['error'] === 'invalid_id') {
                echo '不正なIDが入力されました。';
            } elseif ($_GET['error'] === 'not_found') {
                echo '指定されたToDoは見つかりませんでした。既に削除された可能性もあります。';
            }
            ?>
        </p>
    <?php endif; ?>

    <style>
        .error {
            color: red;
            font-weight: bold;
        }
    </style>

    <h1>ToDoリスト</h1>

    <?php if (!empty($errorMessage)): ?>
        <p class="error"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endif; ?>

    <h3>ToDo数：<?= $todoCount ?>件</h3>

    <a href="/php-0416-training/controllers/CreateController.php">
        <button>新規作成</button>
    </a>

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

</body>


</html>