<?php

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
    
    public function SignUp($name, $lastname, $phone, $email, $card, $photo, $password) {
        //code
        try {
            //code...
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $card_hashed = ConnectDb::EncryptData($card);
            $sql = "INSERT INTO seller (seller_name, seller_lastname, seller_phone, seller_email, seller_card, seller_photo, seller_password)
            VALUES(:seller_name, :seller_lastname, :seller_phone, :seller_email, :seller_card, :seller_photo, :seller_password)";
            $stmt = $this->connection->prepare($sql);
            $array = array(
                ":seller_name" => $name,
                ":seller_lastname" => $lastname,
                ":seller_phone" => $phone,
                ":seller_email" => $email,
                ":seller_card" => $card_hashed,
                ":seller_photo" => $photo,
                ":seller_password" => $password_hashed
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

    public function LogIn($email, $password) {
        try {
            $sql = "SELECT * FROM seller WHERE seller_email = :email";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':email', $email);
            if($stmt->execute()) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                if(count($results) > 0 && password_verify($password, $results['seller_password'])) {
                    return $results['seller_id'];
                } else {
                    return "ERROR PASS";
                }
            } else {
                return "ERROR";
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            return "ERROR";
        }
    }

    public function submitProduct($name, $description, $price, $type, $photo, $seller) {
        try {
            $sql = "INSERT INTO product (seller_id, product_name, product_description, product_price, product_type, product_photo) VALUES(:seller_id, :product_name, :product_description, :product_price, :product_type, :product_photo)";
            $stmt = $this->connection->prepare($sql);
            $array = array(
                ":seller_id" => $seller,
                ":product_name" => $name,
                ":product_description" => $description,
                ":product_price" => $price,
                ":product_type" => $type,
                ":product_photo" => $photo
            );
            if($stmt->execute($array)) {
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

    public function getOwnProducts($id) {
        try {
            $sql = "SELECT * FROM product WHERE seller_id = :seller_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":seller_id", $id);
            if($stmt->execute()) {
                $results = $stmt->fetchAll();
                return $results;
            } else {
                return "ERROR";
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            return "ERROR";
        }
    }

    public function deleteOwnProduct($id) {
        try {
            $sql = "DELETE FROM product WHERE product_id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            if($stmt->execute()) {
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

    public function updateProductPhoto($photo, $file, $id) {
        try {
            $sql = "UPDATE seller SET seller_photo = :photo WHERE seller_id = :seller_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':seller_id', $id);
            if($stmt->execute()) {
                move_uploaded_file($file, $photo);
                return "OK";
            } else {
                return "ERROR";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "ERROR";
        }
    }
}
?>