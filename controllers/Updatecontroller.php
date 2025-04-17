<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../models/Todo.php';

$todoModel = new Todo();

// 入力したデータを取得
$id = $_POST['id'] ?? null;
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

$todoModel->update($id, $title, $content);

// 一覧ページにリダイレクト
header('Location: /php-0416-training/index.php');
exit;
