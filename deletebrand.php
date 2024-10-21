<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Brand</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to home</a>
    <?php $brand = getBrandByID($pdo, $_GET['brand_id']); ?>
    <h1>Are you sure you want to delete this brand?</h1>
    <div class="container">
        <h2>Brand: <?php echo $brand['brand_name']; ?></h2>
        <form action="core/handleForms.php?brand_id=<?php echo $_GET['brand_id']; ?>" method="POST">
            <input type="submit" name="deleteBrandBtn" value="Delete Brand">
        </form>
    </div>
</body>
</html>