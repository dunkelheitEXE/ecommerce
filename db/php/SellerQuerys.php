<?php
require "ConnectDb.php";
class SellerQuerys extends ConnectDb{
    public function verifyExistence($email) {
        try {
            //code...
            $sql = "SELECT * FROM seller WHERE seller_email = :email";
            $stmt = $this->connection->prepare($sql);
            if($stmt->execute([":email" => $email])) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                if(empty($results)) {
                    return "EMPTY";
                } else {
                    return "FILL";
                }
            } else {
                return "EMPTY";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "ERROR";
        }
    }
    
    public function SignUp($name, $email, $password, $address, $number, $card) {
        //code
        try {
            //code...
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $card_hashed = password_hash($card, PASSWORD_BCRYPT);
            $sql = "INSERT INTO seller (seller_name, seller_email, seller_password, seller_address, seller_number, seller_card) 
            VALUES(:seller_name, :seller_email, :seller_password, :seller_address, :seller_number, :seller_card)";

            $stmt = $this->connection->prepare($sql);
            $array = array(
                ":seller_name" => $name,
                ":seller_email" => $email,
                ":seller_password" => $password_hashed,
                ":seller_address" => $address,
                ":seller_number" => $number,
                ":seller_card" => $card_hashed
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