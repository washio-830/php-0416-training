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
            $todo = (object)[
                'id' => $id,
                'title' => $title,
                'content' => $content
            ];
        
            $maxTitleLength = Validation::MAX_TITLE_LENGTH;
            $maxContentLength = Validation::MAX_CONTENT_LENGTH;
        
            require_once __DIR__ . '/../views/errors/update_error.php';
            return;
        }
        

        $todoModel = new Todo();
        $todoModel->update($id, $title, $content);

        header('Location: /php-0416-training/index.php');
        exit;
    }
}

$controller = new UpdateController();
$controller->handle();
