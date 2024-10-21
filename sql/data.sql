CREATE TABLE brands (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,  
    country_of_origin VARCHAR(100),  
    website_url VARCHAR(255),  
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP,  
    last_updated DATETIME ON UPDATE CURRENT_TIMESTAMP 
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    sku VARCHAR(100) UNIQUE NOT NULL,  
    price DECIMAL(10, 2) CHECK (price >= 0),  
    quantity_in_stock INT DEFAULT 0 CHECK (quantity_in_stock >= 0),  
    brand_id INT,
    category VARCHAR(100),  
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP,  
    last_updated DATETIME ON UPDATE CURRENT_TIMESTAMP,  
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id) ON DELETE CASCADE
);