<?php

require_once "../classes/User.php";
session_start();

if($_SERVER['REQUEST_METHOD']==="POST") {
    $user = new User();
    $loggedIn = $user->login($_POST['username'], $_POST['password']);

    if($loggedIn) {
        $_SESSION['user'] = $loggedIn;
        header("Location: ../index.php");
        exit;
    }
    else {
        $error = "Invalid login.";
    }
}
?>

<form action="" method="post">
    <h2>Login</h2>
    <input type="text" name="username" required placeholder="Username"><br>

    <input type="password" name="password" id="" required placeholder="Password"><br>

    <button>Login</button>

    <?=isset($error)?"<p style='color:red;'> $error</p>":""?>
</form>