<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../helpers/Validation.php';

// フォームのPOSTデータを受け取る
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

// バリデーション
$errors = validateTodoInput($title, $content); // ← IDないバージョン
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color:red;">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
    }
    echo '<a href="/php-0416-training/views/create.php"><button>戻る</button></a>';
    exit;
}

$todoModel = new Todo();
$todoModel->create($title, $content);

// 一覧ページに戻る
header('Location: /php-0416-training/index.php');
exit;
