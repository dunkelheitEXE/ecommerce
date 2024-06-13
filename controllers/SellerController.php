<?php
require "db/php/SellerQuerys.php";
class SellerController {
    public function verifyExistence($email) {
        try{
            $connection = new SellerQuerys;
            $results = $connection->verifyExistence($email);

            if($results == "EMPTY") {
                return "EMPTY";

            } else if ($results == "FILL"){
                return "<div class='tg tg-danger'>
                    THIS USER ALREADY EXISTS!
                </div>";

            } else {
                return "<div class='tg tg-danger'>
                    ERROR IN FUNCTION 'verifyExistence()'
                </div>";

            }
            
        } catch(\Throwable $th) {
            echo $th;
            echo "<div class='tg tg-danger'>
                ERROR IN FUNCTION 'verifyExistence()'
            </div>";
            return "ERROR";
        }
    }

    public function SignUp($name, $email, $password, $address, $number, $card, $photo, $file_photo) {
        try {
            //code...
            $connection = new SellerQuerys;
            if(!empty($photo)) {
                move_uploaded_file($file_photo, $photo);
            }
            $result = $connection->SignUp($name, $email, $password, $address, $number, $card, $photo);
            if($result != "ERROR") {
                return "<div class='tg tg-success'>
                    User signed up successfully! Now you can <a href='login.php' class='link-warning'>Log in</a>
                </div>";
            } else {
                return "<div class='tg tg-danger'>
                    Something has gone wrong!
                </div>";
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            return "<div class='tg tg-danger'>
                Something has gone wrong!
            </div>";
        }
    }

    public function LogIn($email, $password) {
        try{
            $connection = new SellerQuerys;
            $results = $connection->LogIn($email, $password);
            if($results == "ERROR") {
                return "ERROR";
            } else {
                return $results;
            }
        }catch(\Throwable $th) {
            return "ERROR";
        }
    }
}
?>