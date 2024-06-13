<?php
session_start();
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
require "controllers/SellerController.php";
$signup = new SellerController;
include('include/header.php');
echo '<title>Login</title>';
include('include/navbar.php');
if(isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $card = isset($_POST['card']) ? $_POST['card'] : '';
    $photo = isset($_FILES['photo']['name']) ? 'static/photos/'.$_FILES['photo']['name'] : '';

    if($signup->verifyExistence($email) == "EMPTY") {
        $message = $signup->SignUp($name, $email, $password, $address, $number, $card, $photo, $_FILES['photo']['tmp_name']);
        if(!empty($message)) {
            echo $message;
        }
    } else {
        echo $signup->verifyExistence($email);
    }
}
include('components/SignupCom.php');
include('include/footer.php');
?>
