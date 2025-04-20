<?php

include 'db.php';
session_start();

$msg = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($user = $result->fetch_assoc()) {
        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] === 'admin') {
                header("Location: dashboard.php?admin");
            }
            else {
                header("Location: dashboard.php");
            }
            exit;
        }
        else {
            $msg = "Incorrect password.";
        }
    }
    else {
        $msg = "User not found.";
    }
    $stmt->close();
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
        <?php if ($msg): ?>
            <div class="alert alert-danger"><?= $msg ?></div>
        <?php endif; ?>
        <form method="POST">
            <input name="username" class="form-control mb-2" placeholder="Username" required>
            <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>
            <button class="btn btn-success">Login</button>
        </form>
        <p class="mt-3">No account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>