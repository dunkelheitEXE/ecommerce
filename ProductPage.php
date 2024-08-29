<?php
session_start();
require "db/php/ConnectDb.php";
require "controllers/ProductController.php";
$productConnection = new ProductController;
$resultsMedia = $productConnection->productMediaPrice();
$minprice = $productConnection->productMinorPrice();
include("include/header.php");
echo "<title>Products</title>";
include("include/navbar.php");
include("components/ProductCom.php");
include("include/footer.php");
?>