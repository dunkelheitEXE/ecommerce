<?php
session_start();
require "db/php/ConnectDb.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
require "controllers/UserController.php";
$connection = new UserController;

$id = $_SESSION['user-id'];
$results = $connection->getProducts($id);
$resultsJson = json_encode($results);
echo $resultsJson;
?>