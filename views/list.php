<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ToDoリスト</title>
</head>

<body>
    <h1>ToDoリスト</h1>
    <table border="1">
        <tr>
            <th>タイトル</th>
            <th>内容</th>
            <th>作成日時</th>
            <th>更新日時</th>
        </tr>
        <?php foreach ($todos as $todo): ?>
            <tr>
                <td><?= htmlspecialchars($todo['title'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= nl2br(htmlspecialchars($todo['content'], ENT_QUOTES, 'UTF-8')) ?></td>
                <td><?= $todo['created_at'] ?></td>
                <td><?= $todo['updated_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>