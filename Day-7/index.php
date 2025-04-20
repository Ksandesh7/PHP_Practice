<?php include 'db.php'; ?>

<?php

$name = $email = $phone = "";
$msg = "";

if($_SERVER["REQUEST_METHOD"]==="POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));

    if($name && $email && $phone) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone) values(?,?,?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        $stmt->execute();
        $stmt->close();
        $msg = "Contact added successfully!";
    }
    else {
        $msg = "All fields are required.";
    }
}

$contacts = $conn->query("SELECT * from contacts Order by id asc");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="p-4">
    <div class="container">
        <h2>Contact Manager</h2>

        <?php if($msg): ?>
            <div class="alert alert-info"><?= $msg?></div>
        <?php endif; ?>

        <form action="" method="POST" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Name" required value="<?=$name?>">
            </div>

            <div class="col-md-4">
                <input type="email" name="email" class="form-control" placeholder="Email" required value="<?=$email?>">
            </div>

            <div class="col-md-4">
                <input type="text" name="phone" class="form-control" placeholder="Phone" required value="<?=$phone?>">
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Add contact</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row=$contacts->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["name"])?></td>
                        <td><?= htmlspecialchars($row["email"])?></td>
                        <td><?= htmlspecialchars($row["phone"])?></td>
                        <td>
                            <a href="edit.php?id=<?=$row['id']?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this contact?')">Delete</a>

                        </td>
                    </tr>

                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html> 