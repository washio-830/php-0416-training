<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../helpers/Validation.php';

class StoreController
{
    public function handle(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        $validator = new Validation();
        $errors = $validator->validateTodoInput($title, $content);

        if (!empty($errors)) {
            // エラービューへ
            require __DIR__ . '/../views/errors/validation_error.php';
            return;
        }

        $todoModel = new Todo();
        $todoModel->update($id, $title, $content);

        header('Location: /php-0416-training/index.php');
        exit;
    }
}

// 実行
$controller = new StoreController();
$controller->handle();
