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

ALTER TABLE user MODIFY user_phone VARCHAR(20) DEFAULT NULL;
ALTER TABLE user MODIFY user_card VARCHAR(255) DEFAULT NULL;

ALTER TABLE user ADD user_country VARCHAR(100) DEFAULT NULL;
ALTER TABLE user ADD FOREIGN KEY(user_country) REFERENCES countries(country_name)
ON DELETE CASCADE ON UPDATE CASCADE;

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

CREATE TABLE product_images(
    product_id BIGINT NOT NULL,
    image_url VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY(product_id) REFERENCES product (product_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE countries (
    country_name VARCHAR(255) NOT NULL,
    PRIMARY KEY(country_name)
);

-- HOME WORK
SELECT user_name FROM user WHERE user_id IN (SELECT user_id FROM product WHERE product_type = "device");
SELECT user.user_id FROM user;
DROP VIEW usuarios_productos;
CREATE VIEW usuarios_productos AS SELECT user_id AS id, CONCAT(user_name, ' ', user_lastname) AS complete_name,
(SELECT COUNT(product_name) FROM product WHERE user_id = id) AS productos_vendiendo FROM user;
SELECT * FROM usuarios_productos;

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
-- SELECT product_name, product_price FROM product WHERE prodct_price BETWEEN "florero" AND "lap" ORDER BY product_name;
-- SELECT product_name, product_price FROM product WHERE prodct_price NOT BETWEEN "florero" AND "lap" ORDER BY product_name;


-- INSERT INTOS
INSERT INTO countries (country_name) VALUES ('Afghanistan');
INSERT INTO countries (country_name) VALUES ('Albania');
INSERT INTO countries (country_name) VALUES ('Algeria');
INSERT INTO countries (country_name) VALUES ('Andorra');
INSERT INTO countries (country_name) VALUES ('Angola');
INSERT INTO countries (country_name) VALUES ('Antigua and Barbuda');
INSERT INTO countries (country_name) VALUES ('Argentina');
INSERT INTO countries (country_name) VALUES ('Armenia');
INSERT INTO countries (country_name) VALUES ('Australia');
INSERT INTO countries (country_name) VALUES ('Austria');
INSERT INTO countries (country_name) VALUES ('Azerbaijan');
INSERT INTO countries (country_name) VALUES ('Bahamas');
INSERT INTO countries (country_name) VALUES ('Bahrain');
INSERT INTO countries (country_name) VALUES ('Bangladesh');
INSERT INTO countries (country_name) VALUES ('Barbados');
INSERT INTO countries (country_name) VALUES ('Belarus');
INSERT INTO countries (country_name) VALUES ('Belgium');
INSERT INTO countries (country_name) VALUES ('Belize');
INSERT INTO countries (country_name) VALUES ('Benin');
INSERT INTO countries (country_name) VALUES ('Bhutan');
INSERT INTO countries (country_name) VALUES ('Bolivia');
INSERT INTO countries (country_name) VALUES ('Bosnia and Herzegovina');
INSERT INTO countries (country_name) VALUES ('Botswana');
INSERT INTO countries (country_name) VALUES ('Brazil');
INSERT INTO countries (country_name) VALUES ('Brunei');
INSERT INTO countries (country_name) VALUES ('Bulgaria');
INSERT INTO countries (country_name) VALUES ('Burkina Faso');
INSERT INTO countries (country_name) VALUES ('Burundi');
INSERT INTO countries (country_name) VALUES ('Cabo Verde');
INSERT INTO countries (country_name) VALUES ('Cambodia');
INSERT INTO countries (country_name) VALUES ('Cameroon');
INSERT INTO countries (country_name) VALUES ('Canada');
INSERT INTO countries (country_name) VALUES ('Central African Republic');
INSERT INTO countries (country_name) VALUES ('Chad');
INSERT INTO countries (country_name) VALUES ('Chile');
INSERT INTO countries (country_name) VALUES ('China');
INSERT INTO countries (country_name) VALUES ('Colombia');
INSERT INTO countries (country_name) VALUES ('Comoros');
INSERT INTO countries (country_name) VALUES ('Democratic Republic of the Congo');
INSERT INTO countries (country_name) VALUES ('Republic of the Congo');
INSERT INTO countries (country_name) VALUES ('Costa Rica');
INSERT INTO countries (country_name) VALUES ('Croatia');
INSERT INTO countries (country_name) VALUES ('Cuba');
INSERT INTO countries (country_name) VALUES ('Cyprus');
INSERT INTO countries (country_name) VALUES ('Czech Republic');
INSERT INTO countries (country_name) VALUES ('Denmark');
INSERT INTO countries (country_name) VALUES ('Djibouti');
INSERT INTO countries (country_name) VALUES ('Dominica');
INSERT INTO countries (country_name) VALUES ('Dominican Republic');
INSERT INTO countries (country_name) VALUES ('Ecuador');
INSERT INTO countries (country_name) VALUES ('Egypt');
INSERT INTO countries (country_name) VALUES ('El Salvador');
INSERT INTO countries (country_name) VALUES ('Equatorial Guinea');
INSERT INTO countries (country_name) VALUES ('Eritrea');
INSERT INTO countries (country_name) VALUES ('Estonia');
INSERT INTO countries (country_name) VALUES ('Eswatini');
INSERT INTO countries (country_name) VALUES ('Ethiopia');
INSERT INTO countries (country_name) VALUES ('Fiji');
INSERT INTO countries (country_name) VALUES ('Finland');
INSERT INTO countries (country_name) VALUES ('France');
INSERT INTO countries (country_name) VALUES ('Gabon');
INSERT INTO countries (country_name) VALUES ('Gambia');
INSERT INTO countries (country_name) VALUES ('Georgia');
INSERT INTO countries (country_name) VALUES ('Germany');
INSERT INTO countries (country_name) VALUES ('Ghana');
INSERT INTO countries (country_name) VALUES ('Greece');
INSERT INTO countries (country_name) VALUES ('Grenada');
INSERT INTO countries (country_name) VALUES ('Guatemala');
INSERT INTO countries (country_name) VALUES ('Guinea');
INSERT INTO countries (country_name) VALUES ('Guinea-Bissau');
INSERT INTO countries (country_name) VALUES ('Guyana');
INSERT INTO countries (country_name) VALUES ('Haiti');
INSERT INTO countries (country_name) VALUES ('Honduras');
INSERT INTO countries (country_name) VALUES ('Hungary');
INSERT INTO countries (country_name) VALUES ('Iceland');
INSERT INTO countries (country_name) VALUES ('India');
INSERT INTO countries (country_name) VALUES ('Indonesia');
INSERT INTO countries (country_name) VALUES ('Iran');
INSERT INTO countries (country_name) VALUES ('Iraq');
INSERT INTO countries (country_name) VALUES ('Ireland');
INSERT INTO countries (country_name) VALUES ('Israel');
INSERT INTO countries (country_name) VALUES ('Italy');
INSERT INTO countries (country_name) VALUES ('Jamaica');
INSERT INTO countries (country_name) VALUES ('Japan');
INSERT INTO countries (country_name) VALUES ('Jordan');
INSERT INTO countries (country_name) VALUES ('Kazakhstan');
INSERT INTO countries (country_name) VALUES ('Kenya');
INSERT INTO countries (country_name) VALUES ('Kiribati');
INSERT INTO countries (country_name) VALUES ('Korea, North');
INSERT INTO countries (country_name) VALUES ('Korea, South');
INSERT INTO countries (country_name) VALUES ('Kosovo');
INSERT INTO countries (country_name) VALUES ('Kuwait');
INSERT INTO countries (country_name) VALUES ('Kyrgyzstan');
INSERT INTO countries (country_name) VALUES ('Laos');
INSERT INTO countries (country_name) VALUES ('Latvia');
INSERT INTO countries (country_name) VALUES ('Lebanon');
INSERT INTO countries (country_name) VALUES ('Lesotho');
INSERT INTO countries (country_name) VALUES ('Liberia');
INSERT INTO countries (country_name) VALUES ('Libya');
INSERT INTO countries (country_name) VALUES ('Liechtenstein');
INSERT INTO countries (country_name) VALUES ('Lithuania');
INSERT INTO countries (country_name) VALUES ('Luxembourg');
INSERT INTO countries (country_name) VALUES ('Madagascar');
INSERT INTO countries (country_name) VALUES ('Malawi');
INSERT INTO countries (country_name) VALUES ('Malaysia');
INSERT INTO countries (country_name) VALUES ('Maldives');
INSERT INTO countries (country_name) VALUES ('Mali');
INSERT INTO countries (country_name) VALUES ('Malta');
INSERT INTO countries (country_name) VALUES ('Marshall Islands');
INSERT INTO countries (country_name) VALUES ('Mauritania');
INSERT INTO countries (country_name) VALUES ('Mauritius');
INSERT INTO countries (country_name) VALUES ('Mexico');
INSERT INTO countries (country_name) VALUES ('Micronesia');
INSERT INTO countries (country_name) VALUES ('Moldova');
INSERT INTO countries (country_name) VALUES ('Monaco');
INSERT INTO countries (country_name) VALUES ('Mongolia');
INSERT INTO countries (country_name) VALUES ('Montenegro');
INSERT INTO countries (country_name) VALUES ('Morocco');
INSERT INTO countries (country_name) VALUES ('Mozambique');
INSERT INTO countries (country_name) VALUES ('Myanmar');
INSERT INTO countries (country_name) VALUES ('Namibia');
INSERT INTO countries (country_name) VALUES ('Nauru');
INSERT INTO countries (country_name) VALUES ('Nepal');
INSERT INTO countries (country_name) VALUES ('Netherlands');
INSERT INTO countries (country_name) VALUES ('New Zealand');
INSERT INTO countries (country_name) VALUES ('Nicaragua');
INSERT INTO countries (country_name) VALUES ('Niger');
INSERT INTO countries (country_name) VALUES ('Nigeria');
INSERT INTO countries (country_name) VALUES ('North Macedonia');
INSERT INTO countries (country_name) VALUES ('Norway');
INSERT INTO countries (country_name) VALUES ('Oman');
INSERT INTO countries (country_name) VALUES ('Pakistan');
INSERT INTO countries (country_name) VALUES ('Palau');
INSERT INTO countries (country_name) VALUES ('Palestine');
INSERT INTO countries (country_name) VALUES ('Panama');
INSERT INTO countries (country_name) VALUES ('Papua New Guinea');
INSERT INTO countries (country_name) VALUES ('Paraguay');
INSERT INTO countries (country_name) VALUES ('Peru');
INSERT INTO countries (country_name) VALUES ('Philippines');
INSERT INTO countries (country_name) VALUES ('Poland');
INSERT INTO countries (country_name) VALUES ('Portugal');
INSERT INTO countries (country_name) VALUES ('Qatar');
INSERT INTO countries (country_name) VALUES ('Romania');
INSERT INTO countries (country_name) VALUES ('Russia');
INSERT INTO countries (country_name) VALUES ('Rwanda');
INSERT INTO countries (country_name) VALUES ('Saint Kitts and Nevis');
INSERT INTO countries (country_name) VALUES ('Saint Lucia');
INSERT INTO countries (country_name) VALUES ('Saint Vincent and the Grenadines');
INSERT INTO countries (country_name) VALUES ('Samoa');
INSERT INTO countries (country_name) VALUES ('San Marino');
INSERT INTO countries (country_name) VALUES ('Sao Tome and Principe');
INSERT INTO countries (country_name) VALUES ('Saudi Arabia');
INSERT INTO countries (country_name) VALUES ('Senegal');
INSERT INTO countries (country_name) VALUES ('Serbia');
INSERT INTO countries (country_name) VALUES ('Seychelles');
INSERT INTO countries (country_name) VALUES ('Sierra Leone');
INSERT INTO countries (country_name) VALUES ('Singapore');
INSERT INTO countries (country_name) VALUES ('Slovakia');
INSERT INTO countries (country_name) VALUES ('Slovenia');
INSERT INTO countries (country_name) VALUES ('Solomon Islands');
INSERT INTO countries (country_name) VALUES ('Somalia');
INSERT INTO countries (country_name) VALUES ('South Africa');
INSERT INTO countries (country_name) VALUES ('South Sudan');
INSERT INTO countries (country_name) VALUES ('Spain');
INSERT INTO countries (country_name) VALUES ('Sri Lanka');
INSERT INTO countries (country_name) VALUES ('Sudan');
INSERT INTO countries (country_name) VALUES ('Suriname');
INSERT INTO countries (country_name) VALUES ('Sweden');
INSERT INTO countries (country_name) VALUES ('Switzerland');
INSERT INTO countries (country_name) VALUES ('Syria');
INSERT INTO countries (country_name) VALUES ('Taiwan');
INSERT INTO countries (country_name) VALUES ('Tajikistan');
INSERT INTO countries (country_name) VALUES ('Tanzania');
INSERT INTO countries (country_name) VALUES ('Thailand');
INSERT INTO countries (country_name) VALUES ('Timor-Leste');
INSERT INTO countries (country_name) VALUES ('Togo');
INSERT INTO countries (country_name) VALUES ('Tonga');
INSERT INTO countries (country_name) VALUES ('Trinidad and Tobago');
INSERT INTO countries (country_name) VALUES ('Tunisia');
INSERT INTO countries (country_name) VALUES ('Turkey');
INSERT INTO countries (country_name) VALUES ('Turkmenistan');
INSERT INTO countries (country_name) VALUES ('Tuvalu');
INSERT INTO countries (country_name) VALUES ('Uganda');
INSERT INTO countries (country_name) VALUES ('Ukraine');
INSERT INTO countries (country_name) VALUES ('United Arab Emirates');
INSERT INTO countries (country_name) VALUES ('United Kingdom');
INSERT INTO countries (country_name) VALUES ('United States');
INSERT INTO countries (country_name) VALUES ('Uruguay');
INSERT INTO countries (country_name) VALUES ('Uzbekistan');
INSERT INTO countries (country_name) VALUES ('Vanuatu');
INSERT INTO countries (country_name) VALUES ('Vatican City');
INSERT INTO countries (country_name) VALUES ('Venezuela');
INSERT INTO countries (country_name) VALUES ('Vietnam');
INSERT INTO countries (country_name) VALUES ('Yemen');
INSERT INTO countries (country_name) VALUES ('Zambia');
INSERT INTO countries (country_name) VALUES ('Zimbabwe');

SELECT * FROM user;
SELECT * FROM product;