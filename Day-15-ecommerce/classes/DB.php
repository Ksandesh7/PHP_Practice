<?php

class DB {
    private $host = "localhost";
    private $db = "ecommerce";
    private $user = "root";
    private $pass = "";

    public function connect() {
        try {
            return new PDO("mysql:host=$this->host; dbname=$this->db", $this->user, $this->pass);
        }
        catch(PDOException $e) {
            die("DB Error: ".$e->getMessage());
        }
    }
}

?>