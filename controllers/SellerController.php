<?php
require "db/php/SellerQuerys.php";
class SellerController {
    public function SignIn($name, $email, $password, $number, $card) {
        try {
            //code...
            $connection = new SellerQuerys;
            $result = $connection->SignIn($name, $email, $password, $number, $card);
            if($result != "ERROR") {
                return "<div class='tg tg-danger'>
                    
                </div>";
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
?>