<?php

include 'db.php';

$id = $_GET['id'];
$msg = "";

$result = $conn->query("SELECT * FROM contacts WHERE id=$id");
$contact = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"]==="POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));

    $stmt = $conn->prepare("UPDATE contacts SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        
    <h2>Edit Contact</h2>

    <form method="POST" class="row g-3">
        <div class="col-md-4">
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($contact['name']) ?>" required>
        </div>
        <div class="col-md-4">
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($contact['email']) ?>" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($contact['phone']) ?>" required>
        </div>
        <div class="col-12">
            <button class="btn btn-success" type="submit">Update Contact</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>

    
    </div>
</body>
</html>