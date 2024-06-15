<?php
session_start();
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/SellerController.php";
$connection = new SellerController;

$id = $_SESSION['user-id'];
$results = $connection->getProducts($id);
$resultsJson = json_encode($results);
echo $resultsJson;
?>