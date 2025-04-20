<?php include 'db.php'; ?>

<?php

$name = $email = $age = "";
$errors = [];
$success = false;

if($_SERVER["REQUEST_METHOD"]==="POST") {
    if(empty($_POST["name"])) $errors[] = "Name is required.";
    else $name = htmlspecialchars(trim($_POST['name']));
    
    if(empty($_POST["email"])) $errors[] = "Email is required.";
    else $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    
    if(empty($_POST["age"]) || !is_numeric($_POST['age'])) $errors[] = "Valid age is required.";
    else $age = (int) $_POST["age"];

    if(empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO USERS(name, email, age) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $name, $email, $age);

        if($stmt->execute()) {
            $success = true;
            $name = $email = $age = "";
        }
        else {
            $errors[] = "Error: ".$stmt->error;
        }

        $stmt->close();
    }
}

$result = $conn->query("SELECT * FROM users ORDER BY id ASC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>User Data Entry</h2>
    <?php if($success): ?>
        <p style="color: green;">Data Inserted Successfully!</p>
    <?php endif; ?>

    <?php if(!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach($errors as $e): ?>
                <li><?=$e?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="">Name:</label><br>
        <input type="text" name="name" value="<?=htmlspecialchars($name)?>"><br><br>
        
        <label for="">Email:</label><br>
        <input type="email" name="email" value="<?=htmlspecialchars($email)?>"><br><br>
        
        <label for="">Age:</label><br>
        <input type="number" name="age" value="<?=htmlspecialchars($age)?>"><br><br>

        <button type="submit">Save</button>
    </form>

    <hr>

    <h3>Registered Users</h3>
    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Registered At</th></tr>
        <?php while($row=$result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"]?></td>
                <td><?= htmlspecialchars($row['name'])?></td>
                <td><?= htmlspecialchars($row['email'])?></td>
                <td><?= $row["age"]?></td>
                <td><?= $row["created_at"]?></td>
            </tr>
            <?php endwhile;?>
    </table>
    
</body>
</html>