<?php

require_once "classes/Post.php";

if(isset($_GET['id'])) {
    $post = new Post();
    $post->delete($_GET['id']);
}

header("Location: index.php");
exit;
?>