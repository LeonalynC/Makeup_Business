<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="viewproducts.php?brand_id=<?php echo $_GET['brand_id']; ?>">Return to products</a>
    <?php $product = getProductByID($pdo, $_GET['product_id']); ?>
    <h1>Edit Product</h1>
    <form action="core/handleForms.php?product_id=<?php echo $_GET['product_id']; ?>&brand_id=<?php echo $_GET['brand_id']; ?>" method="POST">
        <p>
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required>
        </p>
        <p>
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        </p>
        <p>
            <label for="sku">SKU</label>
            <input type="text" name="sku" value="<?php echo $product['sku']; ?>" required>
        </p>
        <p>
            <label for="quantity_in_stock">Quantity in Stock</label>
            <input type="number" name="quantity_in_stock" min="0" value="<?php echo $product['quantity_in_stock']; ?>" required>
        </p>
        <p>
            <label for="category">Category</label>
            <input type="text" name="category" value="<?php echo $product['category']; ?>" required>
        </p>
        <input type="submit" name="editProductBtn" value="Save Changes">
    </form>
</body>
</html>