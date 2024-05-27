<?php
require "ConnectDb.php";
class SellerQuerys extends ConnectDb{
    public function SignIn($name, $email, $password, $number, $card) {
        //code
        try {
            //code...
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $card_hashed = password_hash($card, PASSWORD_BCRYPT);
            $sql = "INSERT INTO seller (seller_name, seller_email, seller_password, seller_number, seller_card) 
            VALUES(:seller_name, :seller_email, :seller_password, :seller_number, :seller_card)";

            $stmt = $this->connection->prepare($sql);
            $array = array(
                ":seller_name" => $name,
                ":seller_email" => $email,
                ":seller_password" => $password_hashed,
                ":seller_number" => $number,
                ":seller_card" => $card
            );
            if($stmt->execute($array)){
                return "OK";
            } else {
                return "ERROR";
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            return "ERROR";
        }
    }
}
?>