<?php
session_start();
require "db/php/ConnectDb.php";
if(isset($_SESSION['user-id'])) {
    header('Location: home.php');
}
require "controllers/UserController.php";
$login = new UserController;
include('include/header.php');
echo '<title>Login</title>';
include('include/navbar.php');

if(isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $results = $login->LogIn($email, $password);
    if($results == "ERROR PASS") {
        echo '
            <div class="alert alert-danger m-5">
                SOME OF YOUR CREDENTIALS ARE WRONG
            </div>
        ';
    } else if($results == "ERROR") {
        echo '
            <div class="alert alert-danger m-5">
                SOME OF YOUR CREDENTIALS ARE WRONG
            </div>
        ';
    } else {
        $id = $results['user_id'];
        $user_type = $results['user_type'];
        
        $_SESSION['user-id'] = $id;
        $_SESSION['user-type'] = $user_type;
        header('Location: home.php');
    }
}

include('components/LogInCom.php');
include('include/footer.php');
?>
