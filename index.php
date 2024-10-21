<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Business</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Makeup Business Management System</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="brand_name">Brand Name</label> 
            <input type="text" name="brand_name" required>
        </p>
        <p>
            <label for="description">Description</label>
            <textarea name="description" required></textarea>
        </p>
        <p>
            <label for="country_of_origin">Country of Origin</label>
            <input type="text" name="country_of_origin" required>
        </p>
        <p>
            <label for="website_url">Website URL</label>
            <input type="url" name="website_url" required>
        </p>
        <input type="submit" name="insertBrandBtn" value="Add Brand">
    </form>
    <?php $brands = getAllBrands($pdo); ?>
    <?php foreach ($brands as $brand) { ?>
    <div class="container">
        <h3>Brand: <?php echo htmlspecialchars($brand['brand_name']); ?></h3>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($brand['description']); ?></p>
        <p><strong>Country of Origin:</strong> <?php echo htmlspecialchars($brand['country_of_origin']); ?></p>
        <p><strong>Website URL:</strong> <a href="<?php echo htmlspecialchars($brand['website_url']); ?>" target="_blank"><?php echo htmlspecialchars($brand['website_url']); ?></a></p>
        <h3>Date Added: <?php echo htmlspecialchars($brand['date_added']); ?></h3>
        <div>
            <a href="viewproducts.php?brand_id=<?php echo $brand['brand_id']; ?>">View Products</a>
            <a href="editbrand.php?brand_id=<?php echo $brand['brand_id']; ?>">Edit</a>
            <a href="deletebrand.php?brand_id=<?php echo $brand['brand_id']; ?>">Delete</a>
        </div>
    </div>
    <?php } ?>
</body>
</html>