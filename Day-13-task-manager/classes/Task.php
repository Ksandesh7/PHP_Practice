<?php

require_once "Database.php";

class Task {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())-> connect();
    }

    public function addTask($userId, $title, $description, $filePath) {
        $stmt = $this->conn->prepare("INSERT INTO tasks (user_id, title, description, file) VALUES (?,?,?,?)");
        return $stmt->execute([$userId, $title, $description, $filePath]);
    }

    public function getTasks($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE user_id=?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markDone($taskId) {
        $stmt = $this->conn->prepare("Update tasks set is_done=1 where id=?");
        return $stmt->execute([$taskId]);
    }

    public function delete($taskId) {
        $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id=?");
        return $stmt->execute([$taskId]);
    }

    public function getTask($taskId) {
        $stmt = $this->conn->prepare("SELECT * from tasks where id=?");
        $stmt->execute([$taskId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTask($id, $title, $description, $file=null) {
        if($file) {
            $stmt = $this->conn->prepare("UPDATE tasks SET title=?, description=?, file=? WHERE id=?");

            return $stmt->execute([$title, $description, $file, $id]);
        }
        else {
            $stmt = $this->conn->prepare("UPDATE tasks SET title=?, description=? WHERE id=?");
            return $stmt->execute([$title, $description, $id]);
        }
    }

}

?>