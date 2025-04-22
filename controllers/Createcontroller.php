<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../helpers/Validation.php';

class CreateController
{
    public function handle(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // 定数を取得してビューに渡す
            $viewVars = [
                'maxTitleLength' => Validation::MAX_TITLE_LENGTH,
                'maxContentLength' => Validation::MAX_CONTENT_LENGTH,
            ];
            extract($viewVars);
            require_once __DIR__ . '/../views/create.php';
            return;
        }

        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        $errors = Validation::validateTodoInput($title, $content);

        if (!empty($errors)) {
            require_once __DIR__ . '/../views/errors/create_error.php';
            return;
        }

        $todoModel = new Todo();
        $todoModel->create($title, $content);

        header('Location: /php-0416-training/index.php');
        exit;
    }
}

$controller = new CreateController();
$controller->handle();
