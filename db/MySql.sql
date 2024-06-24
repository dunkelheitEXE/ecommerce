-- CREATE DATABASE ecommerce;
USE ecommerce;
-- DROP DATABASE ecommerce;

CREATE TABLE seller (
    seller_id BIGINT NOT NULL AUTO_INCREMENT,
    seller_name VARCHAR(100) NOT NULL,
    seller_lastname VARCHAR(100) NOT NULL,
    seller_phone VARCHAR(20) NOT NULL,
    seller_card VARCHAR(255) NOT NULL,
    seller_photo VARCHAR(255) DEFAULT '',
    PRIMARY KEY(seller_id)
);

CREATE TABLE product(
    product_id BIGINT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(100) NOT NULL,
    product_description VARCHAR(500) NOT NULL,
    product_price DOUBLE NOT NULL,
    product_type VARCHAR(100) NOT NULL,
    PRIMARY KEY(product_id)
);

CREATE TABLE sale(
    sale_id BIGINT NOT NULL AUTO_INCREMENT,
    seller_id BIGINT NOT NULL,
    product_id BIGINT NOT NULL,
    FOREIGN KEY (seller_id) REFERENCES seller(seller_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(sale_id, seller_id, product_id)
);

-- ***************ALTERS*****************
-- ALTER TABLE seller ADD seller_email VARCHAR(255) NOT NULL AFTER seller_phone;
-- ALTER TABLE seller ADD seller_password VARCHAR(255) NOT NULL;
-- ALTER TABLE product ADD product_photo VARCHAR(255) DEFAULT NULL;
-- ALTER TABLE product ADD seller_id BIGINT NOT NULL AFTER product_id;
-- ALTER TABLE product ADD FOREIGN KEY (seller_id) REFERENCES seller(seller_id) ON DELETE CASCADE ON UPDATE CASCADE;
-- ****************DELETES**********************
-- DELETE FROM seller WHERE seller_id = 3;
-- ***************DROPS****************************
DROP TABLE sale;
-- ****************SELECTS*****************

SELECT * FROM seller;
SELECT * FROM product;