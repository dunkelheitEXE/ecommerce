<?php
session_start();
require "db/php/ConnectDb.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/UserController.php";
$connection = new UserController;

$id = $_POST['id'];
$results = $connection->deleteProduct($id);
echo $results;
exit;
?>