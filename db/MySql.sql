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

SELECT * FROM user;
SELECT * FROM product;