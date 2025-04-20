<?php

class Database {
    private $host = "localhost";
    private $dbname = "task_manager";
    private $username = "root";
    private $password = "";

    public function connect() {
        try {
            return new PDO("mysql:host=$this->host;dbname=$this->dbname",
            $this->username,
            $this->password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch(PDOException $e) {
            die("DB Error: ".$e->getMessage());
        }
    }
}
?>