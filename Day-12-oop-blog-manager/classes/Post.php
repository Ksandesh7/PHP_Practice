<?php

require_once "Database.php";

class Post {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($title, $content) {
        $stmt = $this->conn->prepare("INSERT INTO posts (title, content) VALUES (?,?)");
        return $stmt->execute([$title, $content]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE id=?");
        return $stmt->execute([$id]);
    }
}

?>