<?php
session_start();
if(!isset($_SESSION['user-id'])) {
    header('Location: index.php');
}
include("include/header.php");
echo "<title>Edit</title>";
include("include/navbar.php");
include("components/EditProductCom.php");
include("include/footer.php");
?>