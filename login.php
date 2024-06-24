<?php
session_start();
require "db/php/ConnectDb.php";
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
    if($id == "ERROR PASS") {
        echo '
            <div class="tg tg-danger">
                SOME OF YOUR CREDENTIALS ARE WRONG OR BOTH OF YOUR CREDENTIALS ARE WRONG
            </div>
        ';
    } else if($id == "ERROR") {
        echo '
            <div class="tg tg-danger">
                SOMETHING IN THE SERVER HAS GONE WRONG. PLEASE, TRY AGAIN OR CONTACT US IN ...
            </div>
        ';
    } else {
        $_SESSION['user-id'] = $id;
        header('Location: home.php');
    }
}

include('components/LogInCom.php');
include('include/footer.php');
?>
