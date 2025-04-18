<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === null || $id === false) {
    // 不正なIDが入力された → 一覧に戻す
    header('Location: /php-0416-training/index.php?error=invalid_id');
    exit;
}

$todoModel = new Todo();
$todo = $todoModel->findById($id);

if (!$todo) {
    // 該当IDがない → 一覧に戻す
    header('Location: /php-0416-training/index.php?error=not_found');
    exit;
}

// あとは edit.php を表示
require_once __DIR__ . '/../views/edit.php';
