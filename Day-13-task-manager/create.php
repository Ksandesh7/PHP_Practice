<?php

require "init.php";
require_once "classes/Task.php";

if($_SERVER["REQUEST_METHOD"]==="POST") {
    $file = $_FILES['file']['name']?time()."_".basename($_FILES['file']['name']):null;

    if($file) move_uploaded_file($_FILES['file']['tmp_name'],"uploads/" . $file);

    $task = new Task();

    $task->addTask($_SESSION['user']['id'], $_POST['title'], $_POST['description'], $file);

    header("Location: index.php");
}

?>

<h2>New Task</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" required placeholder="Title"><br><br>
    <textarea name="description" id="" required placeholder="Description"></textarea><br><br>
    <input type="file" name="file"><br><br>
    <button>Add Task</button>
</form>