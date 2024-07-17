<?php
require "db/php/ConnectDb.php";
require "controllers/ProductController.php";
$connection = new ProductController;

$id = $_POST['id'];
$connection->SelectOne($id);
?>