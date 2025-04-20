<?php

session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body class="p-4">
    <div class="container">
        <h2>Welcome, <?= htmlspecialchars($username) ?>!</h2>
        <p><strong>Role:</strong> <?= $role ?></p>

        <?php if ($role === "admin"): ?>
            <div class="alert alert-warning">You are in the <strong>Admin Panel</strong>.</div>
        <?php else: ?>
            <div class="alert alert-info">You are a normal user.</div>
        <?php endif; ?>

        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>