<?php
session_start();
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
include('include/header.php');
echo '<title>Login</title>';
include('include/navbar.php');
include('components/SignupCom.php');
include('include/footer.php');
?>
