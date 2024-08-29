<?php
require "db/php/ConnectDb.php";
require "controllers/SellerController.php";
$connection = new SellerController;
$productChar = $connection->getSpecific($_GET['product_id']);
$jsonData = json_encode($productChar);
echo $jsonData;
?>