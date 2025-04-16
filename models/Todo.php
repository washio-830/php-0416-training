<?php
require_once __DIR__ . '/../config/db.php';

class Todo
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->pdo;
    }

    public function getAllTodos()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM todos ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $content)
    {
        //デフォルトだと、サマータイム中のパリ時間(UTC +2)だったので、日本時間(UTC +9)に設定
        date_default_timezone_set('Asia/Tokyo');

        $stmt = $this->pdo->prepare("
            INSERT INTO todos (title, content, created_at, updated_at)
            VALUES (:title, :content, :created_at, :updated_at)
            ORDER BY created_at DESC;
        ");
        $now = date('Y-m-d H:i:s');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':created_at', $now);
        $stmt->bindParam(':updated_at', $now);
        return $stmt->execute();
    }
}
