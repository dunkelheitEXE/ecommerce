<?php
require "db/php/ConnectDb.php";
require "controllers/ProductController.php";
$connection = new ProductController;
$connection->relatedProducts();
?>