<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';

class EditController
{
    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id === null || $id === false) {
            header('Location: /php-0416-training/index.php?error=invalid_id');
            exit;
        }

        $todoModel = new Todo();
        $todo = $todoModel->findById($id);

        if (!$todo) {
            header('Location: /php-0416-training/index.php?error=not_found');
            exit;
        }

        // ビューに渡す
        require_once __DIR__ . '/../views/edit.php';
    }
}

// 実行
$controller = new EditController();
$controller->handle();
