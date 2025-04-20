<?php

class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function all() {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->prepare("SELECT * FROM products WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>