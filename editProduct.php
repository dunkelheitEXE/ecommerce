<?php
session_start();
require "db/php/ConnectDb.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/SellerController.php";
$connection = new SellerController;
$productChar = $connection->getSpecific($_GET['product_id']);
include("include/header.php");
echo "<title>Edit</title>";
include("include/navbar.php");
include("components/EditProductCom.php");
include("include/footer.php");
?>