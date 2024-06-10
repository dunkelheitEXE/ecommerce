<?php
session_start();
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
include("include/header.php");
echo '<title>Home</title>';
include("include/navbar.php");
include("include/footer.php");
?>