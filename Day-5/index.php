<?php

$guestbookFile = 'guestbook.txt';
$name = $message = "";
$errors = [];
$success = false;

if($_SERVER["REQUEST_METHOD"]==="POST") {
    if(empty($_POST["name"])) {
        $errors[] = "Name is required.";
    }
    else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if(empty($_POST["message"])) {
        $errors[] = "Message is required.";
    }
    else {
        $message = htmlspecialchars(trim($_POST['message']));
    }

    if(empty($errors)) {
        $entry = date("Y-m-d H:i:s") . " | $name: $message" . PHP_EOL;
        if(file_put_contents($guestbookFile, $entry, FILE_APPEND | LOCK_EX)) {
            $success = true;
            $name = $message = "";
        }
        else {
            $errors[] = "Could not write to guestbook.";
        }
    }
}

$entries = [];
if(file_exists($guestbookFile) && filesize($guestbookFile)>0) {
    $entries = file($guestbookFile, FILE_IGNORE_NEW_LINES);
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
    <h2>Guestbook</h2>

    <?php if($success): ?>
        <p style="color:green;">Your message was added!</p>
    <?php endif; ?>

    <?php if(!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach($errors as $err): ?>
                <li><?=$err ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="post">
        <label for="">Name: </label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($name)?>"><br>
        
        <label for="">Message: </label><br>
        <textarea name="message" rows="4" cols="40"><?= htmlspecialchars($message)?></textarea><br><br>
        
        <button type="submit">Submit</button>
    </form>

    <hr>

    <h3>Guestbook Entries:</h3>
    <?php if(empty($entries)): ?>
        <p>No entries yet. Be the first!</p>
    <?php else: ?>
        <ul>
            <?php foreach(array_reverse($entries) as $entry): ?>
                <li><?= htmlspecialchars($entry)?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif;?>
</body>
</html>