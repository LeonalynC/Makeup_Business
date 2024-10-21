<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="viewproducts.php?brand_id=<?php echo $_GET['brand_id']; ?>">Return to products</a>
    <?php $product = getProductByID($pdo, $_GET['product_id']); ?>
    <h1>Are you sure you want to delete this product?</h1>
    <div class="container">
        <h2>Product: <?php echo $product['product_name']; ?></h2>
        <h2>Price: <?php echo number_format($product['price'], 2); ?></h2>
        <form action="core/handleForms.php?product_id=<?php echo $_GET['product_id']; ?>&brand_id=<?php echo $_GET['brand_id']; ?>" method="POST">
            <input type="submit" name="deleteProductBtn" value="Delete Product">
        </form>
    </div>
</body>
</html>