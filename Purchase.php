<?php
session_start();
if($_SESSION['user-type'] != "customer") {
    header('Location: home.php');
    exit();
}
require "db/php/ConnectDb.php";
require "controllers/CustomerController.php";
$connection = new CustomerController;
$id_seller = $_POST['seller'];
$id_customer = $_SESSION['user-id'];
$id_product = $_POST['product'];
$connection->buyProduct($id_customer, $id_seller, $id_product);
?>