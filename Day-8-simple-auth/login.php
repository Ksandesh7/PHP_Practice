<?php

session_start();
$error = "";

$valid_user = 'admin';
$valid_pass = "secret123";

if($_SERVER["REQUEST_METHOD"]==="POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    if($user===$valid_user && $pass===$valid_pass) {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $user;

        setcookie("last_login", date("Y-m-d H:i:s"), time()+(86400*7));

        header("Location: dashboard.php");
        exit;
    }
    else {
        $error = "Invalid username or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h2>Login</h2>

        <?php if($error): ?>
            <div class="alert alert-danger"><?=$error?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
    
</body>
</html>