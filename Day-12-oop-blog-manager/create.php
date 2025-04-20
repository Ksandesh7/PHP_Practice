<?php

require_once "classes/Post.php";

if($_SERVER['REQUEST_METHOD']==='POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $post = new Post();
    $post->create($title, $content);
    header("Location: index.php");
    exit;
}
?>

<h2>Create New Post</h2>
<form action="" method="post">
    <label for="">Title</label><br>
    <input type="text" name="title" required><br><br>
    
    <label for="">Content</label><br>
    <textarea name="content" id="" rows="5" required></textarea><br><br>    

    <button type="submit">Save</button>
</form>