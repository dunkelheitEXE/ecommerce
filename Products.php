<?php
session_start();
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/SellerController.php";
$connection = new SellerController;
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$type = $_POST['type'];
$photo = '';
$seller = $_SESSION['user-id'];

$submit = $connection->submitProduct($name, $description, $price, $type, $photo, $seller, '');
echo $submit;
exit;
?>