<?php
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../helpers/Validation.php';

class UpdateController
{
    public function handle(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        $errors = Validation::validateTodoUpdateInput($id, $title, $content);

        if (!empty($errors)) {
            require_once __DIR__ . '/../views/errors/update_error.php';
            return;
        }

        $todoModel = new Todo();
        $todoModel->update($id, $title, $content);

        header('Location: /php-0416-training/index.php');
        exit;
    }
}

// 実行
$controller = new UpdateController();
$controller->handle();
