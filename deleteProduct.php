<?php
session_start();
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/SellerController.php";
$connection = new SellerController;

$id = $_POST['id'];
$results = $connection->deleteProduct($id);
echo $results;
exit;
?>