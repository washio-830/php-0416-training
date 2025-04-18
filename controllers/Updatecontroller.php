<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../helpers/Validation.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

// バリデーション
$errors = validateTodoUpdateInput($id, $title, $content);
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color:red;">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
    }
    echo '<a href="/php-0416-training/views/edit.php?id=' . htmlspecialchars($id) . '"><button>戻る</button></a>';
    exit;
}

// DB更新
$todoModel = new Todo();
$todoModel->update($id, $title, $content);

// 一覧画面にリダイレクト
header('Location: /php-0416-training/index.php');
exit;
