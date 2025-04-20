<?php

require "init.php";
require_once "classes/Task.php";
$task = new Task();
$tasks = $task->getTasks($_SESSION['user']['id']);
?>

<h2>Task List</h2>
<a href="create.php">+ New Task</a> | <a href="auth/logout.php">Logout</a>
<hr>

<?php foreach($tasks as $t): ?>
    <div style="margin-bottom: 20px">
        <strong><?=$t['title']?></strong> <?= $t['is_done'] ? "(Done)" : "" ?><br>
        <p><?=nl2br($t['description'])?></p>
        <?php if($t['file']): ?>
            <a href="uploads/<?=$t['file']?>" target="_blank">📎 Attachment</a><br>
        <?php endif; ?>

        <a href="complete.php?id=<?=$t['id']?>">✅ Done</a>
        <a href="edit.php?id=<?= $t['id'] ?>">✏️ Edit</a> |
        <a href="delete.php?id=<?= $t['id'] ?>" onclick="return confirm('Delete?')">🗑️ Delete</a>
    </div>
<?php endforeach; ?>