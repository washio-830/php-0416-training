<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../models/Todo.php';

$todoModel = new Todo();

// フォームのデータを取得
$id = $_POST['id'] ?? null;

// 削除を実行
$todoModel->delete($id);

// 一覧ページに戻る
header('Location: /php-0416-training/index.php');
exit;
