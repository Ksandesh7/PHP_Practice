<?php

require "init.php";
require_once "classes/Task.php";

$task = new Task();
$taskData = $task->getTask($_GET['id']);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file']['name'] ? time() . "_" .basename($_FILES['file']['name']) : null;

    if($file) move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $file);

    $task->updateTask($_GET['id'], $_POST['title'], $_POST['description'], $file);

    header("Location: index.php");
    exit;
}
?>

<h2>Edit Task</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" value="<?=htmlspecialchars($taskData['title']) ?>" required><br><br>

    <textarea name="description" id="" required><?=htmlspecialchars($taskData['description'])?></textarea><br><br>

    <?php if($taskData['file']): ?>
        <p>Current File: <a href="uploads/<?=$taskData['file']?>" target="_blank"><?=$taskData['file']?></a></p>
    <?php endif; ?>

    <input type="file" name="file"><br><br>
    <button>Update</button>
</form>