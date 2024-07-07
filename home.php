<?php
session_start();
require "db/php/ConnectDb.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
include("include/header.php");
echo '<title>Home</title>';
include("include/navbar.php");
include("components/Home.php");
include("include/footer.php");
?>