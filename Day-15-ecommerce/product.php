<?php

require "init.php";

if(!isset($_GET['id'])) {
    die("Product not found");
}

$id = (int) $_GET['id'];
$item = $product->get($id);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart = $_SESSION['cart'] ?? [];

    if(isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
    }
    else {
        $cart[$id] = [
            'id' => $item['id'],
            'name' => $item['name'],
            'price' => $item['price'],
            'qty' => 1
        ];
    }

    $_SESSION['cart'] = $cart;
    header("Location: cart.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=htmlspecialchars($item['name'])?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class='p-4'>
    <div class="container">
        <a href="index.php" class="btn btn-secondary mb-3">
            ← Back to Shop
        </a>

        <div class="row">
            <div class="col-md-6">
                <img src="uploads/<?= $item['image']?>" class="img-fluid" alt="">
            </div>

            <div class="col-md-6">
                <h2><?= htmlspecialchars($item['name'])?></h2>
                <p class="lead">₹<?= $item['price'] ?></p>
                <p><?= nl2br(htmlspecialchars($item['description'])) ?></p>

                <form action="" method="post">
                    <button type="submit" class="btn btn-success mt-2">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>