<?php
require "db/php/UserQuerys.php";
class UserController {
    public function verifyExistence($email) {
        try{
            $connection = new UserQuerys;
            $results = $connection->verifyExistence($email);

            if($results == "EMPTY") {
                return "EMPTY";

            } else if ($results == "FILL"){
                return "<div class='alert alert-danger m-5'>
                    THIS USER ALREADY EXISTS!
                </div>";

            } else {
                return "<div class='alert alert-danger m-5'>
                    ERROR IN FUNCTION 'verifyExistence()'
                </div>";

            }
            
        } catch(\Throwable $th) {
            echo $th;
            echo "<div class='alert alert-danger m-5'>
                ERROR IN FUNCTION 'verifyExistence()'
            </div>";
            return "ERROR";
        }
    }

    public function SignUp($name, $lastname, $phone, $email, $card, $photo, $password, $userType, $file, $country) {
        try {
            //code...
            $connection = new UserQuerys;
            if(!empty($photo) || $photo != '') {
                move_uploaded_file($file, $photo);
            }
            $result = $connection->SignUp($name, $lastname, $phone, $email, $card, $photo, $password, $userType, $country);
            if($result != "ERROR") {
                return "<div class='alert alert-success'>
                    User signed up successfully! Now you can <a href='login.php' class='link-warning'>Log in</a>
                </div>";
            } else {
                return "<div class='alert alert-danger'>
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
            $connection = new UserQuerys;
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

    public function submitProduct($name, $description, $price, $type, $photo, $user, $file) {
        $connection = new UserQuerys;
        try {
            $results = $connection->submitProduct($name, $description, $price, $type, $photo, $user);
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
        $connection = new UserQuerys;
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
            $connection = new UserQuerys;
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
            $connection = new UserQuerys;
            $message = $connection->updateProductPhoto($photo, $file, $id);
            if($message == "OK") {
                return "<div class='alert alert-success m-5'>
                    IMAGE UPDATED SUCCESSFULLY
                </div>";
            } else {
                return "<div class='alert alert-danger m-5'>
                    SOMETHING HAS GONE WRONG
                </div>";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "<div class='alert alert-danger m-5'>
                SOMETHING HAS GONE WRONG
            </div>";
        }
    }

    public function getSpecific($id) {
        try {
            //code...
            $connection = new UserQuerys;
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

    public function updateProduct($name, $photo, $description, $price, $type, $id) {
        try {
            //code...
            $connection = new UserQuerys;
            $results = $connection->updateProduct($name, $photo, $description, $price, $type, $id);
            if($results == null) {
                return "SOMETHING HAS GONE WRONG IN DATABASE. PLEASE, CONTACT US FOR MORE INFO";
            } else {
                return $results;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return null;
        }
    }
}
?>