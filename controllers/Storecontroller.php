<?php
require_once __DIR__ . '/../models/Todo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($title && $content) {
        $todo = new Todo();
        $todo->create($title, $content);
    }

    // 一覧ページに戻す
    header('Location: /php-0416-training/index.php');
    exit;
}
