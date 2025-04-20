<?php
require "init.php";
require_once "classes/Task.php";

if(isset($_GET['id'])) {
    $task = new Task();
    $task->delete($_GET['id']);
}
header("Location: index.php");
exit;