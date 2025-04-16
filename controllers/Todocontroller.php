<?php
require_once __DIR__ . '/../models/Todo.php';

$todo = new Todo();
$todos = $todo->getAllTodos();

// ビューに渡す（後述の list.php を読み込む）
require_once __DIR__ . '/../views/list.php';
