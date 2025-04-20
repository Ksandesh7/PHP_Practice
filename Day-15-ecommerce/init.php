<?php

session_start();

require_once "classes/DB.php";
require_once "classes/Product.php";

$db = new DB();
$conn = $db->connect();
$product = new Product($conn);

?>