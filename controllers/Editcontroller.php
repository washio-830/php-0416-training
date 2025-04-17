<?php
require_once __DIR__ . '/../models/Todo.php';

$todoModel = new Todo();

$id = $_GET['id'] ?? null;

// 対象のToDoをDBから取得する 
$todo = $todoModel->findById($id);

// 編集フォーム(edit.php)
require_once __DIR__ . '/../views/edit.php';
