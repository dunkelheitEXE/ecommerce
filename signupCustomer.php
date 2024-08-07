<?php
session_start();
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
require "db/php/ConnectDb.php";
require "controllers/UserController.php";
$connection = new UserController;
include("include/header.php");
echo '<link rel="icon" href="static/img/MAIN_LOGO.png">';
echo "<title>Welcome</title>";
include("include/navbar.php");
include("components/signupCustomerCom.php");
include("include/footer.php");
?>