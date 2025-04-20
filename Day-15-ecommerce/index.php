<?php require "init.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>
<body class="p-4"> 
    <div class="container">
        <h1 class="mb-4">🛒 Welcome to My Simple Shop</h1>
        <div class="row">
            <?php foreach($product->all() as $item): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="uploads/<?=$item['image']?>" class="card-img-top" alt="<?= htmlspecialchars($item['name'])?>">

                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['name'])?></h5>
                            <p class="card-text">₹<?=$item['price']?></p>
                            <a href="product.php?id=<?=$item['id']?>" class="btn btn-primary" >View Product</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>