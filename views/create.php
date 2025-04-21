<?php
require_once __DIR__ . '/../helpers/Validation.php';

// 定数を取得して変数化
$maxTitleLength = (new ReflectionClass('Validation'))->getConstant('MAX_TITLE_LENGTH');
$maxContentLength = (new ReflectionClass('Validation'))->getConstant('MAX_CONTENT_LENGTH');

// ビューを読み込む
require_once __DIR__ . '/../views/create.php';
?>

<h1>ToDo新規作成</h1>
<form action="/php-0416-training/create_action.php" method="POST">
    <label>タイトル（<?= htmlspecialchars($maxTitleLength, ENT_QUOTES, 'UTF-8') ?>文字以内）：</label><br>
    <input type="text" name="title" required><br><br>

    <label>内容（<?= htmlspecialchars($maxContentLength, ENT_QUOTES, 'UTF-8') ?>文字以内）：</label><br>
    <textarea name="content" rows="4" cols="40" required></textarea><br><br>

    <input type="submit" value="作成">
</form>