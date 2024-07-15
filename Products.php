<?php
session_start();
require "db/php/ConnectDb.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/UserController.php";
$connection = new UserController;
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$type = $_POST['type'];
$photo = '';
$User = $_SESSION['user-id'];

$submit = $connection->submitProduct($name, $description, $price, $type, $photo, $User, '');
echo $submit;
exit;
?>