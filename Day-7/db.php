<?php

$conn = new mysqli("localhost", "root", "", "contact_manager");

if($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>