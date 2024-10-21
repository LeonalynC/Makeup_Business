<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to home</a>
    <?php $products = getProductsByBrand($pdo, $_GET['brand_id']); ?>
    <h1>Products</h1>
    <form action="core/handleForms.php?brand_id=<?php echo $_GET['brand_id']; ?>" method="POST">
        <p>
            <label for="product_name">Product Name</label> 
            <input type="text" name="product_name" required>
        </p>
        <p>
            <label for="price">Price</label> 
            <input type="number" step="0.01" name="price" required>
        </p>
        <p>
            <label for="sku">SKU</label>
            <input type="text" name="sku" required>
        </p>
        <p>
            <label for="quantity_in_stock">Quantity in Stock</label>
            <input type="number" name="quantity_in_stock" min="0" required>
        </p>
        <p>
            <label for="category">Category</label>
            <input type="text" name="category" required>
        </p>
        <input type="submit" name="insertProductBtn" value="Add Product">
    </form>
    <table class="feminine-table">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>SKU</th>
            <th>Quantity in Stock</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product) { ?>
        <tr>
            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
            <td><?php echo number_format($product['price'], 2); ?></td>
            <td><?php echo htmlspecialchars($product['sku']); ?></td>
            <td><?php echo htmlspecialchars($product['quantity_in_stock']); ?></td>
            <td><?php echo htmlspecialchars($product['category']); ?></td>
            <td>
                <a href="editproduct.php?product_id=<?php echo $product['product_id']; ?>&brand_id=<?php echo $_GET['brand_id']; ?>">Edit</a>
                <a href="deleteproduct.php?product_id=<?php echo $product['product_id']; ?>&brand_id=<?php echo $_GET['brand_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>