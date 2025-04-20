<?php

$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$success = false;

if($_SERVER['REQUEST_METHOD']==="POST") {
    if(empty($_POST["name"])) {
        $nameErr = "Name is required";
    }
    else {
        $name = htmlspecialchars(trim($_POST['name']));
    }

    if(empty($_POST['email'])) {
        $emailErr = "Email is required";
    }
    else {
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if(empty($_POST['message'])) {
        $messageErr = 'Feedback message is required';
    }
    else {
        $message = htmlspecialchars(trim($_POST['message']));
    }

    if(empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $success = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Feedback Form</h2>

    <?php if($success): ?>
        <p style="color:green;"><strong>Thank you for your feedback, <?= $name ?></strong></p>
    <?php else: ?>
    <form action="" method="POST">
        <label for="">Name: </label>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>
        <span style="color:red;"><?= $nameErr ?></span><br><br>

        <label for="">Email: </label>
        <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
        <span style="color:red;"><?= $emailErr ?></span><br><br>

        <label for="">Feedback Message: </label>
        <textarea name="message" rows="4" cols="40"><?= htmlspecialchars($message) ?></textarea><br>
        <span style="color:red;"><?= $messageErr ?></span><br><br>

        <button type="submit">Submit Feedback</button>
    </form>
    <?php endif;?>
</body>
</html>