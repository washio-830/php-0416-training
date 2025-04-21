<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Todo.php';
require_once __DIR__ . '/../helpers/Validation.php';

class CreateController
{
    public function handle(): void
    {
        // POSTデータの取得
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        // Todoモデルのインスタンス生成
        $todoModel = new Todo();

        // ToDo数取得
        $todos = $todoModel->getAllTodos();
        $todoCount = count($todos);

        // バリデーション
        $errors = Validation::validateTodoInput($title, $content, $todoCount);

        if (!empty($errors)) {
            require_once __DIR__ . '/../views/errors/create_error.php';
            return;
        }

        // 新規作成処理
        $todoModel->create($title, $content);

        // 一覧ページへリダイレクト
        header('Location: /php-0416-training/index.php');
        exit;
    }
}
