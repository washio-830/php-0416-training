<?php

// 新規作成時のバリデーション（IDなし）
function validateTodoInput(string $title, string $content): array
{
    $errors = [];

    if (trim($title) === '') {
        $errors[] = 'タイトルを入力してください。';
    }

    if (trim($content) === '') {
        $errors[] = '内容を入力してください。';
    }

    return $errors;
}

// 更新時のバリデーション（IDあり）
function validateTodoUpdateInput($id, string $title, string $content): array
{
    $errors = [];

    if (!is_numeric($id) || (int)$id <= 0) {
        $errors[] = '不正な操作です。';
    }

    if (trim($title) === '') {
        $errors[] = 'タイトルを入力してください。';
    }

    if (trim($content) === '') {
        $errors[] = '内容を入力してください。';
    }

    return $errors;
}
