<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../helpers/Validation.php';

class ListController
{
    public function handle(): void
    {
        $todoModel = new Todo();
        $todos = $todoModel->getAllTodos();
        $todoCount = count($todos);

        $errorMessage = '';
        if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case 'invalid_id':
                    $errorMessage = 'ERROR：不正なIDが入力されました。';
                    break;
                case 'not_found':
                    $errorMessage = 'ERROR：指定されたToDoは見つかりませんでした。';
                    break;
            }
        }

        require __DIR__ . '/../views/list.php';
    }
}

$controller = new ListController();
$controller->handle();
