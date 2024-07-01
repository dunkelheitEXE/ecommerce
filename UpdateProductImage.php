<?php
session_start();
require "db/php/ConnectDb.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/SellerController.php";
$connection = new SellerController;
$imgsrc = $connection->getSpecific($_GET['product_id']);
include('include/header.php');
echo '<title>Update Profile</title>';
include('include/navbar.php');
if(isset($_POST['submit']) && !empty($_FILES['photo']['name'])) {
    $photo = 'static/photos/' . $_FILES['photo']['name'];
    $file = $_FILES['photo']['tmp_name'];
    $results = $connection->updateProductPhoto($photo, $file, $_GET['product_id']);
    echo $results;
}
include('components/UpdateProductImage.php');
include('include/footer.php');
?>