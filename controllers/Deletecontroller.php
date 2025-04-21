<?php
require_once __DIR__ . '/../models/Todo.php';

class DeleteController
{
    public function handle(): void
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            header('Location: /php-0416-training/index.php?error=invalid_id');
            exit;
        }

        $todoModel = new Todo();
        $todoModel->delete($id);

        header('Location: /php-0416-training/index.php');
        exit;
    }
}

// 実行
$controller = new DeleteController();
$controller->handle();
