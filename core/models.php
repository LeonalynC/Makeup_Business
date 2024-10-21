<?php

function insertBrand($pdo, $brand_name, $description, $country_of_origin, $website_url) {
    $sql = "SELECT COUNT(*) FROM brands WHERE brand_name = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$brand_name]);

    if ($stmt->fetchColumn() > 0) {
        throw new Exception("Brand name already exists.");
    }

    $sql = "INSERT INTO brands (brand_name, description, country_of_origin, website_url, date_added) VALUES(?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$brand_name, $description, $country_of_origin, $website_url]);
}

function updateBrand($pdo, $brand_id, $brand_name, $description, $country_of_origin, $website_url) {
    $sql = "UPDATE brands SET brand_name = ?, description = ?, country_of_origin = ?, website_url = ?, last_updated = NOW() WHERE brand_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$brand_name, $description, $country_of_origin, $website_url, $brand_id]);
}

function deleteBrand($pdo, $brand_id) {
    $sql = "DELETE FROM brands WHERE brand_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$brand_id]);
}

function getAllBrands($pdo) {
    $sql = "SELECT * FROM brands";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getBrandByID($pdo, $brand_id) {
    $sql = "SELECT * FROM brands WHERE brand_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$brand_id]);
    return $stmt->fetch();
}

function insertProduct($pdo, $product_name, $price, $sku, $quantity_in_stock, $category, $brand_id) {
    $sql = "SELECT COUNT(*) FROM products WHERE sku = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$sku]);

    if ($stmt->fetchColumn() > 0) {
        throw new Exception("SKU already exists.");
    }

    $sql = "INSERT INTO products (product_name, price, sku, quantity_in_stock, category, brand_id, date_added) VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$product_name, $price, $sku, $quantity_in_stock, $category, $brand_id]);
}

function updateProduct($pdo, $product_id, $product_name, $price, $sku, $quantity_in_stock, $category) {
    $sql = "UPDATE products SET product_name = ?, price = ?, sku = ?, quantity_in_stock = ?, category = ?, last_updated = NOW() WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$product_name, $price, $sku, $quantity_in_stock, $category, $product_id]);
}

function deleteProduct($pdo, $product_id) {
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$product_id]);
}

function getProductsByBrand($pdo, $brand_id) {
    $sql = "SELECT * FROM products WHERE brand_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$brand_id]);
    return $stmt->fetchAll();
}

function getProductByID($pdo, $product_id) {
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    return $stmt->fetch();
}

?>