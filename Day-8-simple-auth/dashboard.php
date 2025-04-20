<?php

session_start();

if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]!==true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="p-4">
    <div class="container">
        <h2>Welcome, <?=htmlspecialchars($_SESSION['username'])?>!</h2>

        <?php if(isset($_COOKIE["last_login"])):?>
            <p><strong>Last Login:</strong><?=$_COOKIE["last_login"]?></p>
        <?php endif; ?>

        <p>This is a protected page only visible after login.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>

    </div>

</body>
</html>