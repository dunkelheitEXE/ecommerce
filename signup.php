<?php
session_start();
require "db/php/ConnectDb.php";
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
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $card = isset($_POST['card']) ? $_POST['card'] : '';
    $photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $file = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : '';

    if($signup->verifyExistence($email) == "EMPTY") {
        $message = $signup->SignUp($name, $lastname, $phone, $email, $card, 'static/photos/'.$photo, $password, $file);
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
