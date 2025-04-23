<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/config.php';

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

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? new TodoEntity($data) : null;
    }


    public function update($id, $title, $content)
    {
        $stmt = $this->pdo->prepare("
            UPDATE todos 
            SET title = :title, content = :content, updated_at = :updated_at 
            WHERE id = :id
        ");
        $now = date('Y-m-d H:i:s');

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':updated_at', $now);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

class TodoEntity
{
    public int $id;
    public string $title;
    public string $content;
    public string $created_at;
    public string $updated_at;

    public function __construct(array $data)
    {
        $this->id = (int) $data['id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
