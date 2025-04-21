<?php
require_once __DIR__ . '/../models/Todo.php';

class TodoController
{
    public function handle(): void
    {
        $todoModel = new Todo();
        $todos = $todoModel->getAllTodos();
        $todoCount = count($todos);

        // ビューに渡す
        require_once __DIR__ . '/../views/list.php';
    }
}

// 実行
$controller = new TodoController();
$controller->handle();
