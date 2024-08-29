<?php
session_start();
require "db/php/ConnectDb.php";
require "controllers/SellerController.php";
$connection = new SellerController;
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
include("include/header.php");
echo '<title>Home</title>';
include("include/navbar.php");
if(isset($_SESSION['user-id']) && $_SESSION['user-type'] == "seller") {
    $connection->getGoods($_SESSION['user-id']);
}
include("components/Home.php");
include("include/footer.php");
?>