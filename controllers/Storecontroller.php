<?php
require_once __DIR__ . '/../models/config.php';
require_once __DIR__ . '/../models/Todo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($title && $content) {
        $todo = new Todo();
        $todo->create($title, $content);
    }

    header('Location: /php-0416-training/index.php');
    exit;
}
