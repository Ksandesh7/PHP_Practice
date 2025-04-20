<?php

require "init.php";

$cart = $_SESSION['cart'] ?? [];

// Remove item
if(isset($_GET['remove'])) {
    $id = (int) $_GET['remove'];
    unset($cart[$id]);
    $_SESSION['cart'] = $cart;
    header("Location: cart.php");
    exit;
}


// Update Quantities
if($_SERVER['REQUEST_METHOD']==='POST') {
    foreach($_POST['qty'] as $id=>$qty) {
        $id = (int)$id;
        $qty = (int)$qty;

        if($qty > 0) {
            $cart[$id]['qty'] = $qty;
        }
        else {
            unset($cart[$id]);
        }
    }
    $_SESSION['cart'] = $cart;
    header("Location: cart.php");
    exit;
}

$total = 0;
foreach($cart as $item) {
    $total += $item['price'] * $item['qty'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class='p-4'>
    <div class="container">
        <h1 class="mb-4">🛒 Your Cart</h1>

        <?php if(empty($cart)): ?>
            <p>Your cart is empty.</p>
            <a href="index.php" class="btn btn-primary">Back to Shop</a>
        <?php else: ?>
            <form action="" method="post">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th width="100">Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($cart as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['name'])?></td>
                                <td>₹<?=$item['price']?></td>
                                <td>
                                    <input type="number" name="qty[<?= $item['id']?>]" value="<?=$item['qty']?>" min="1" class="form-control">
                                </td>

                                <td>₹<?= $item['price'] * $item['qty']?></td>

                                <td>
                                    <a href="?remove=<?=$item['id']?>" class="btn btn-danger btn-sm">X</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <h4>Total: ₹<?= number_format($total, 2)?></h4>
                <button type="submit" class="btn btn-info">Update Cart</button>
                <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
            </form>
        <?php endif; ?>
    </div>
    
</body>
</html>
