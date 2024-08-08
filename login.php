<?php
session_start();
require "db/php/ConnectDb.php";
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
require "controllers/UserController.php";
$login = new UserController;
include('include/header.php');
echo '<title>Login</title>';
include('include/navbar.php');

if(isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $login->LogIn($email, $password);
}

include('components/LogInCom.php');
include('include/footer.php');
?>