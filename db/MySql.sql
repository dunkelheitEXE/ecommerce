CREATE DATABASE ecommerce;
USE ecommerce;

CREATE TABLE seller(
    seller_id INT NOT NULL AUTO_INCREMENT,
    seller_name VARCHAR(255) NOT NULL,
    seller_email VARCHAR(300) NOT NULL,
    seller_number VARCHAR(12) NOT NULL,
    seller_card VARCHAR(500),
    PRIMARY KEY(seller_id)
);

CREATE TABLE products(
    product_id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_description VARCHAR(500) NOT NULL,
    product_price DOUBLE NOT NULL,
    product_type VARCHAR(200) NOT NULL,
    -- FOREIGN KEY HERE
    seller_id INT NOT NULL,
    FOREIGN KEY (seller_id) REFERENCES seller(seller_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(product_id)
);

-- ***************ALTERS*****************
-- ALTER TABLE seller ADD seller_password VARCHAR(500) NOT NULL AFTER seller_email; 
-- ALTER TABLE seller ADD seller_address VARCHAR(500) NOT NULL AFTER seller_password;
-- ALTER TABLE seller ADD seller_photo VARCHAR(500) DEFAULT '' AFTER seller_card;
-- ALTER TABLE products ADD product_photo VARCHAR(500) DEFAULT '' AFTER product_type;
-- ****************DELETES**********************
-- DELETE FROM seller WHERE seller_id = 3;
-- ****************SELECTS*****************

SELECT * FROM seller;
SELECT * FROM products;