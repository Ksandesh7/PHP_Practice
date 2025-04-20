<?php

include 'db.php';
session_start();

$msg = "";

if($_SERVER["REQUEST_METHOD"]==="POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if($username && $email && $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hash);

        if($stmt->execute()) {
            $msg = "Signup successful! You can now <a href='login.php'>login</a>.";
        }
        else {
            $msg = "Signup failed: ".$stmt->error;
        }

        $stmt->close();
    }
    else {
        $msg = 'All fields are required.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Signup</h2>
        <?php if($msg): ?>
            <div class="alert alert-info"><?=$msg?></div>
        <?php endif; ?>

        <form action="" method="post">
            <input name="username" class="form-control mb-2" placeholder="Username" required>

            <input name="email" type="email" class="form-control mb-2" placeholder="Email" required>

            <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>

            <button class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>