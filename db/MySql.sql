-- CREATE DATABASE ecommerce;
USE ecommerce;
-- DROP DATABASE ecommerce;


-- DROP TABLE seller;
CREATE TABLE user (
    user_id BIGINT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL,
    user_lastname VARCHAR(100) NOT NULL,
    user_phone VARCHAR(20) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_card VARCHAR(255) NOT NULL,
    user_photo VARCHAR(255) DEFAULT '',
    user_password VARCHAR(255) NOT NULL,
    user_type VARCHAR(100) NOT NULL,
    PRIMARY KEY(user_id)
);

-- DROP TABLE product;
CREATE TABLE product(
    product_id BIGINT NOT NULL AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    product_description VARCHAR(500) NOT NULL,
    product_price DOUBLE NOT NULL,
    product_type VARCHAR(100) NOT NULL,
    product_photo VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(product_id)
);

-- ***************ALTERS*****************
-- ALTER TABLE user ADD user_email VARCHAR(255) NOT NULL AFTER user_phone;
-- ALTER TABLE user ADD user_password VARCHAR(255) NOT NULL;
-- ALTER TABLE product ADD product_photo VARCHAR(255) DEFAULT NULL;
-- ALTER TABLE product ADD user_id BIGINT NOT NULL AFTER product_id;
-- ALTER TABLE product ADD FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
-- ****************DELETES**********************
-- DELETE FROM user WHERE user_id = 3;
-- ***************DROPS****************************
-- DROP TABLE sale;
-- ****************SELECTS*****************
-- Distinct
-- SELECT COUNT (DISCTINCT product_price) AS precios_diferentes FROM product;
-- SELECT * FROM product ORDER BY product_price;
-- SELECT * FROM product ORDER BY product_price DESC;
-- SELECT product_price, COUNT(*) FROM product GROUP BY product_price HAVING product_price>=19.0 ORDER BY product_price DESC;
-- SELECT * FROM product LIMIT 4;
-- SELECT * FROM product WHERE product_price >= 9 LIMIT 3;
-- SELECT * FROM product FROM product LIMIT 2,3;
-- SELECT product_name, product_price FROM product WHERE product_price IN (19);
-- SELECT product_name, product_price FROM product WHERE product_name IN ("florero", "lap");
-- SELECT product_name, product_price FROM product WHERE product_price IN (15, 15);
-- SELECT product_name, product_price FROM product WHERE product_price NOT IN(19.5, 15.5);
-- SELECT product_name, product_price FROM product WHERE product_name NOT IN("LAP", "FLORERO") ORDER BY product_price DESC;
-- SELECT product_name, product_price FROM product WHERE prodct_price BETWEEN 15.5 AND 19 ORDER BY product_name;
-- SELECT product_name, product_price FROM product WHERE prodct_price NOT BETWEEN 15.5 AND 19 ORDER BY product_name;
SELECT product_name, product_price FROM product WHERE prodct_price BETWEEN "florero" AND "lap" ORDER BY product_name;
SELECT product_name, product_price FROM product WHERE prodct_price NOT BETWEEN "florero" AND "lap" ORDER BY product_name;

SELECT * FROM user;
SELECT * FROM product;