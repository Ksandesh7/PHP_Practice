<?php

session_start();
if($_SERVER['REQUEST_METHOD']=='POST') {
    $_SESSION['age'] = $_POST['age'] ?? '';
    $_SESSION['gender'] = $_POST['gender'] ?? '';
    header("Location: step3.php");
    exit;
}

require 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 2</title>
</head>
<body>
    <h2>Step 2: Demographics</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="">Age</label>
            <input type="number" class="form-control" name='age' value="<?=$_SESSION['age'] ?? ''?>" required>
        </div>

        <div class="mb-3">
            <label for="">Gender</label>
            <select name="gender" id="" class="form-control">
                <option value="">-- SELECT --</option>
                <option value="Male" <?=($_SESSION['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?=($_SESSION['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?=($_SESSION['gender'] ?? '') == 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <button class="btn btn-primary">Next</button>
    </form>

    <?php require 'includes/footer.php'; ?>
</body>
</html>