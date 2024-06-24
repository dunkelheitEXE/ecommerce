<?php
session_start();
require "db/php/ConnectDb.php";
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
include('include/header.php');
echo '<title>Update Profile</title>';
include('include/navbar.php');
include('include/footer.php');
?>