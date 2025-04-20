<?php

session_start();

if($_SERVER['REQUEST_METHOD']==='POST') {
    $_SESSION['name'] = $_POST['name'] ?? '';
    $_SESSION['email'] = $_POST['email'] ?? '';
    header("Location: step2.php");
    exit;
}

require 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step-1</title>
</head>
<body>
    <h2>Step 1: Personal Info</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="<?=$_SESSION['name'] ?? ''?>" required>
        </div>
        
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="<?=$_SESSION['email'] ?? ''?>" required>
        </div>

        <button class="btn btn-primary">Next</button>
    </form>

    <?php require 'includes/footer.php'; ?>
</body>
</html>