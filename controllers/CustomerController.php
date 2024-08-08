<?php
require "db/php/CustomerQueries.php";
class CustomerController {
    public function signUpCustomer($name, $lastname, $email, $photo, $file, $password, $type) {
        try {
            $connection = new CustomerQueries;
            $results = $connection->signUpCustomer($name, $lastname, $email, $photo, $file, $password, $type);
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
}
?>