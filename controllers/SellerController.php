<?php
require "db/php/SellerQueries.php";
class SellerController {
    public function verifyExistence($email) {
        try{
            $connection = new SellerQueries;
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

    public function SignUp($name, $lastname, $phone, $email, $card, $photo, $password, $file, $country) {
        try {
            //code...
            $connection = new SellerQueries;
            if(!empty($photo) || $photo != '') {
                move_uploaded_file($file, $photo);
            }
            $result = $connection->SignUp($name, $lastname, $phone, $email, $card, $photo, $password, $country);
            if($result == "OK") {
                return "<div class='alert alert-success m-5'>
                    User signed up successfully! Now you can <a href='login.php' class='alert-link'>Log in</a>
                </div>";
            } else {
                return "<div class='alert alert-danger m-5'>
                    ". $result ."
                </div>";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "<div class='tg tg-danger m-5'>
                ". $th ."
            </div>";
        }
    }

    public function LogIn($email, $password) {
        try{
            $connection = new SellerQueries;
            $results = $connection->LogIn($email, $password);
            if(!empty($results)) {
                $sellerId = $results['seller_id'];
                $_SESSION['user-id'] = $sellerId;
                $_SESSION['user-type'] = "seller";
                header('Location: home.php');
            } else {
                echo '
                    <div class="alert alert-danger m-5">
                        YOUR CREDENTIALS ARE WRONG. PLEASE, TRY AGAIN
                    </div>
                ';
            }
        }catch(\Throwable $th) {
            return "ERROR";
        }
    }

    public function submitProduct($name, $description, $price, $type, $photo, $seller, $file) {
        $connection = new SellerQueries;
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
        $connection = new SellerQueries;
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
            $connection = new SellerQueries;
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
            $connection = new SellerQueries;
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
            $connection = new SellerQueries;
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

    public function updateProduct($name, $description, $price, $type, $id) {
        try {
            //code...
            $connection = new SellerQueries;
            $results = $connection->updateProduct($name, $description, $price, $type, $id);
            if($results == "OK") {
                header('Location: home.php');
            } else {
                echo "<div class='alert alert-danger m-5'>
                    ". $results ."
                </div>";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "<div class='alert alert-danger m-5'>
                SOMETHING HAS GONE WRONG IN DATABASE. PLEASE, TRY AGAIN OR LATER
            </div>";
        }
    }

    public function getGoods($id) {
        try {
            $connection = new SellerQueries;
            $results = $connection->getGoods($id);
            if(!empty($results)) {
                echo '
                    <div class="alert alert-warning m-5">
                        YOUR GAIN: '. $results .'
                    </div>
                ';
            } else {
                echo '
                    <div class="alert alert-warning m-5">
                        YOUR GAIN: 0
                    </div>
                ';
            }
        } catch(\Throwable $th) {
            echo '
                <div class="alert alert-warning m-5">
                    '. $th->getMessage() .'
                </div>
            ';
        }
    }
}
?>