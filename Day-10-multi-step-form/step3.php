<?php

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['comments'] = $_POST['comments'] ?? '';
    header("Location: summary.php");
    exit;
}

require 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step-3</title>
</head>
<body>
    <h2>Step 3: Feedback</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Comments</label>
            <textarea name="comments" id="" class="form-control" required><?= $_SESSION['comments'] ?? ''?></textarea>
        </div>

        <button class="btn btn-primary">Finish</button>
    </form>

    <?php require 'includes/footer.php'; ?>
</body>
</html>