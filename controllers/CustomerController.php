<?php
require "db/php/CustomerQueries.php";
class CustomerController {
    public function signUpCustomer($name, $lastname, $email, $photo, $file, $password) {
        try {
            $connection = new CustomerQueries;
            $results = $connection->signUpCustomer($name, $lastname, $email, $photo, $file, $password);
            if($results == "OK") {
                echo "<div class='alert alert-success m-5'>
                    You have been signed up successfully. Now you can <a href='login.php' class='alert-link'>log in</a>
                </div>";
            } else {
                echo "<div class='alert alert-danger m-5'>
                    ". $results ."
                </div>";
            }
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger m-5'>
                ". $th->getMessage() ."
            </div>";
        }
    }

    public function loginCustomer($email, $password) {
        $connection = new CustomerQueries;
        $results = $connection->loginCus($email, $password);
        if(!empty($results)) {
            $_SESSION['user-id'] = $results['buyer_id'];
            $_SESSION['user-type'] = "customer";
            header('Location: home.php');
        } else {
            echo '<div class="alert alert-danger">
                SOMETHING HAS GONE WRONG
            </div>';
        }
    }

    public function buyProduct($id_customer, $id_seller, $id_product) {
        $connection = new CustomerQueries;
        $results = $connection->buyProduct($id_customer, $id_seller, $id_product);
        try {
            if($results == "OK") {
                $mensaje = "YOU HAVE BOUGHT THIS PRODUCT";
                echo $mensaje;
            } else {
                $mensaje = $results;
                echo $mensaje;
            }
        } catch (\Throwable $th){
            $mensaje = $th->getMessage();
            echo $mensaje;
        }
    }
}
?>
