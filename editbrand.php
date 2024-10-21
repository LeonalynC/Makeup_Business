<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to home</a>
    <?php $brand = getBrandByID($pdo, $_GET['brand_id']); ?>
    <h1>Edit Brand</h1>
    <form action="core/handleForms.php?brand_id=<?php echo $_GET['brand_id']; ?>" method="POST">
        <p>
            <label for="brand_name">Brand Name</label>
            <input type="text" name="brand_name" value="<?php echo $brand['brand_name']; ?>" required>
        </p>
        <p>
            <label for="description">Description</label>
            <textarea name="description" required><?php echo $brand['description']; ?></textarea>
        </p>
        <p>
            <label for="country_of_origin">Country of Origin</label>
            <input type="text" name="country_of_origin" value="<?php echo $brand['country_of_origin']; ?>" required>
        </p>
        <p>
            <label for="website_url">Website URL</label>
            <input type="url" name="website_url" value="<?php echo $brand['website_url']; ?>" required>
        </p>
        <input type="submit" name="editBrandBtn" value="Save Changes">
    </form>
</body>
</html>
