<?php

require_once "classes/Post.php";

$post = new Post();
$posts = $post->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog posts</title>
</head>
<body>
    <h2>Blog Posts</h2>
    <a href="create.php">+ New Post</a>
    <hr>

    <?php foreach($posts as $p):?>
        <h3><?=htmlspecialchars($p['title'])?></h3>
        <p><?=nl2br(htmlspecialchars($p['content'])) ?></p>
        <small>Posted on <?= $p['created_at']?></small>
        <br><a href="delete.php?id=<?=$p['id'] ?>" onclick="return confirm('Delete this post?')">Delete</a>
        <hr>
        <?php endforeach;?>
</body>
</html>