<?php
session_start();
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
require "db/php/ConnectDb.php";
require "controllers/CustomerController.php";
require "controllers/FormController.php";
$connection = new CustomerController;
include("include/header.php");
echo '<link rel="icon" href="static/img/MAIN_LOGO.png">';
echo "<title>Welcome</title>";
include("include/navbar.php");
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $photo = $_FILES['photo']['name'];
    $file = $_FILES['photo']['tmp_name'];
    $type = "customer";
    $connection->signUpCustomer($name, $lastname, $email, $photo, $file, $password, $type);
}
include("components/signupCustomerCom.php");
include("include/footer.php");
?>