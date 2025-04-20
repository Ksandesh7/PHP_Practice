<?php

session_start();
require 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
</head>
<body>
    <h2>Summary</h2>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Name:</strong> <?=htmlspecialchars($_SESSION['name'] ?? '')?></li>

        <li class="list-group-item"><strong>Email:</strong> <?=htmlspecialchars($_SESSION['email'] ?? '')?></li>

        <li class="list-group-item"><strong>Age:</strong> <?=htmlspecialchars($_SESSION['age'] ?? '')?></li>

        <li class="list-group-item"><strong>Gender:</strong> <?=htmlspecialchars($_SESSION['gender'] ?? '')?></li>

        <li class="list-group-item"><strong>Comments:</strong> <?= nl2br(htmlspecialchars($_SESSION['comments'] ?? '')) ?></li>
    </ul>

    <a href="reset.php" class="btn btn-danger">Start Over</a>

    <?php require 'includes/footer.php'; ?>
</body>
</html>