<?php
session_start();
require "db/php/ConnectDb.php";
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
require "controllers/SellerController.php";
$login = new SellerController;
include('include/header.php');
echo '<title>Login</title>';
include('include/navbar.php');

require "controllers/CustomerController.php";
$newLogin = new CustomerController;
if(isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $newLogin->loginCustomer($email, $password);
}

include('components/LoginCustomerCom.php');
include('include/footer.php');
?>