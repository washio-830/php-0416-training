<?php
require_once __DIR__ . '/../models/Todo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if (!empty($title) && !empty($content)) {
        $todo = new Todo();
        $todo->create($title, $content);

        header('Location: /php-0416-training/index.php');
        exit;
    }
}

// POSTじゃない（GET）の場合はフォームを表示する
require_once __DIR__ . '/../views/create.php';
