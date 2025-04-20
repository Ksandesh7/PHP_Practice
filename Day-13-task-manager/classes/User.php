<?php

require_once "Database.php";

class User {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
?>