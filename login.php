<?php
session_start();
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
require "controllers/SellerController.php";
$login = new SellerController;
include('include/header.php');
echo '<title>Login</title>';
include('include/navbar.php');

if(isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $id = $login->LogIn($email, $password);
    if($id == "ERROR") {
        echo "<div class='tg tg-danger'>
            You have not could log in, something has gone wrong
        </div>";
    } else {
        $_SESSION['user-id'] = $id;
        header('Location: home.php');
    }
}

include('components/LogInCom.php');
include('include/footer.php');
?>
