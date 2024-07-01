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

    public function SignUp($name, $lastname, $phone, $email, $card, $photo, $password, $file) {
        try {
            //code...
            $connection = new SellerQuerys;
            if(!empty($photo) || $photo != '') {
                move_uploaded_file($file, $photo);
            }
            $result = $connection->SignUp($name, $lastname, $phone, $email, $card, $photo, $password);
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
            if($results == "ERROR PASS") {
                return "ERROR PASS";
            } else if($results == "ERROR"){
                return "ERROR";
            } else {
                return $results;
            }
        }catch(\Throwable $th) {
            return "ERROR";
        }
    }

    public function submitProduct($name, $description, $price, $type, $photo, $seller, $file) {
        $connection = new SellerQuerys;
        try {
            $results = $connection->submitProduct($name, $description, $price, $type, $photo, $seller);
            if($results == "ERROR") {
                return "ERROR";
            } else {
                if(!empty($file) || $file != '') {
                    move_uploaded_file($file, $photo);
                }
                return "OK";
            }
        } catch(\Throwable $th) {
            echo $th;
            return "ERROR";
        }
    }

    public function getProducts($id) {
        $connection = new SellerQuerys;
        try {
            //code...
            $results = $connection->getOwnProducts($id);
            if($results == "ERROR") {
                return "Something in DB has gone wrong";
            } else {
                return $results;
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            return "Something in DB has gone wrong";
        }
    }

    public function deleteProduct($id) {
        try {
            $connection = new SellerQuerys;
            $results = $connection->deleteOwnProduct($id);
            if($results == "ERROR") {
                return "<div class='tg tg-danger'>
                    SOMETHING HAS GONE WRONG
                </div>";
            } else {
                return "<div class='tg tg-success'>
                    OBJECT DELETE SUCCESSFULLY
                </div>";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "<div class='tg tg-danger'>
                    SOMETHING HAS GONE WRONG
                </div>";
        }
    }

    public function updateProductPhoto($photo, $file, $id) {
        try {
            $connection = new SellerQuerys;
            $message = $connection->updateProductPhoto($photo, $file, $id);
            if($message == "OK") {
                return "IMAGE UPDATED SUCCESSFULLY";
            } else {
                return "SOMETHING HAS GONE WRONG";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "SOMETHING HAS GONE WRONG";
        }
    }

    public function getSpecific($id) {
        try {
            //code...
            $connection = new SellerQuerys;
            $results = $connection->getSpecific($id);
            if($results != null) {
                return $results;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return null;
        }
    }
}
?>