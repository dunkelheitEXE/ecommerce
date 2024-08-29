<?php
require "db/php/ConnectDb.php";
require "controllers/SellerController.php";
$connection = new SellerController;
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$type = $_POST['type'];
$connection->updateProduct($name, $description, $price, $type, $_POST['param']);
?>