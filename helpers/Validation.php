<?php

class Validation
{
    // TODO_COUNT→ToDoの最大件数
    public const MAX_TODO_COUNT   = 20;
    // TITLE_LENGTH→タイトルの最大字数
    public const MAX_TITLE_LENGTH = 20;
    // CONTENT_LENGTH→内容の最大字数
    public const MAX_CONTENT_LENGTH = 50;

    // 新規作成・編集用
    public static function validateTodoInput(string $title, string $content, $todoCount = null): array
    {
        $errors = [];

        if ($todoCount !== null && $todoCount >= self::MAX_TODO_COUNT) {
            $errors[] = 'ToDoの最大件数（' . self::MAX_TODO_COUNT . '件）を超えています。これ以上タスクを増やす前に、既存のToDoを片付けましょう。';
        }

        if (trim($title) === '') {
            $errors[] = 'タイトルを入力してください。';
        } elseif (mb_strlen($title) > self::MAX_TITLE_LENGTH) {
            $errors[] = 'タイトルは' . self::MAX_TITLE_LENGTH . '文字以内で入力してください。一目で何をすべきかがわかるタイトルが良いですよ。';
        }

        if (trim($content) === '') {
            $errors[] = '内容を入力してください。';
        } elseif (mb_strlen($content) > self::MAX_CONTENT_LENGTH) {
            $errors[] = '内容は' . self::MAX_CONTENT_LENGTH . '文字以内で入力してください。' . self::MAX_CONTENT_LENGTH . '文字に抑えられない内容なら、タスクの分割化を検討した方がよいかもしれませんね。';
        }

        return $errors;
    }

    // 更新用のバリデーション
    public static function validateTodoUpdateInput(?int $id, string $title, string $content): array
    {
        $errors = [];

        if ($id === null || $id === false) {
            $errors[] = '不正なIDです。';
        }

        $errors = array_merge($errors, self::validateTodoInput($title, $content));

        return $errors;
    }
}
