<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertBrandBtn'])) {
    try {
        insertBrand($pdo, $_POST['brand_name'], $_POST['description'], $_POST['country_of_origin'], $_POST['website_url']);
        header("Location: ../index.php");
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['editBrandBtn'])) {
    try {
        updateBrand($pdo, $_GET['brand_id'], $_POST['brand_name'], $_POST['description'], $_POST['country_of_origin'], $_POST['website_url']);
        header("Location: ../index.php");
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['deleteBrandBtn'])) {
    if (deleteBrand($pdo, $_GET['brand_id'])) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

if (isset($_POST['insertProductBtn'])) {
    try {
        insertProduct($pdo, $_POST['product_name'], $_POST['price'], $_POST['sku'], $_POST['quantity_in_stock'], $_POST['category'], $_GET['brand_id']);
        header("Location: ../viewproducts.php?brand_id=" . $_GET['brand_id']);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['editProductBtn'])) {
    try {
        updateProduct($pdo, $_GET['product_id'], $_POST['product_name'], $_POST['price'], $_POST['sku'], $_POST['quantity_in_stock'], $_POST['category']);
        header("Location: ../viewproducts.php?brand_id=" . $_GET['brand_id']);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['deleteProductBtn'])) {
    if (deleteProduct($pdo, $_GET['product_id'])) {
        header("Location: ../viewproducts.php?brand_id=" . $_GET['brand_id']);
    } else {
        echo "Deletion failed";
    }
}
?>

