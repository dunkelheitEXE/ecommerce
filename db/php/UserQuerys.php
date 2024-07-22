<?php

class UserQuerys extends ConnectDb{
    public function verifyExistence($email) {
        try {
            //code...
            $sql = "SELECT * FROM user WHERE user_email = :email";
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
    
    public function SignUp($name, $lastname, $phone, $email, $card, $photo, $password, $userType) {
        //code
        try {
            //code...
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $card_hashed = ConnectDb::EncryptData($card);
            $sql = "INSERT INTO user (user_name, user_lastname, user_phone, user_email, user_card, user_photo, user_password, user_type)
            VALUES(:user_name, :user_lastname, :user_phone, :user_email, :user_card, :user_photo, :user_password, :user_type)";
            $stmt = $this->connection->prepare($sql);
            $array = array(
                ":user_name" => $name,
                ":user_lastname" => $lastname,
                ":user_phone" => $phone,
                ":user_email" => $email,
                ":user_card" => $card_hashed,
                ":user_photo" => $photo,
                ":user_password" => $password_hashed,
                ":user_type" => $userType
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
            $sql = "SELECT * FROM user WHERE user_email = :email";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':email', $email);
            if($stmt->execute()) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                if(count($results) > 0 && password_verify($password, $results['user_password'])) {
                    return $results;
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

    public function submitProduct($name, $description, $price, $type, $photo, $user) {
        try {
            $sql = "INSERT INTO product (user_id, product_name, product_description, product_price, product_type, product_photo) VALUES(:user_id, :product_name, :product_description, :product_price, :product_type, :product_photo)";
            $stmt = $this->connection->prepare($sql);
            $array = array(
                ":user_id" => $user,
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
            $sql = "SELECT * FROM product WHERE user_id = :user_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":user_id", $id);
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
            $sql = "UPDATE product SET product_photo = :photo WHERE product_id = :product_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':product_id', $id);
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

    public function updateProduct($name, $photo, $description, $price, $type, $id) {
        try {
            //code...
            if($photo == '') {
                $sql = "UPDATE product SET product_name = :product_name, product_description = :product_description, product_price = :product_price, product_type = :product_type";
                $stmt = $this->connection->prepare($sql);
                $array = array(
                    ":product_name" => $name,
                    ":product_description" => $description,
                    ":product_price" => $price,
                    ":product_type" => $type
                );
                if($stmt->execute($array)) {
                    return "OK";
                } else {
                    return "ERROR";
                }
            } else {
                $sql = "UPDATE product SET product_name = :product_name, product_description = :product_description, product_price = :product_price, product_type = :product_type, product_photo = :product_photo";
                $stmt = $this->connection->prepare($sql);
                $array = array(
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
            }
        } catch (\Throwable $th) {
            //throw $th;
            return null;
        }
    }

    public function getAllProducts() {
        try {
            $sql = "SELECT * FROM product";
            $stmt = $this->connection->prepare($sql);
            if($stmt->execute()) {
                $results = $stmt->fetchAll();
                return $results;
            } else {
                return null;
            }
        } catch(\Throwable $th) {
            echo $th;
            return null;
        }
    }

    public function getSpecific($id) {
        try {
            $sql = "SELECT * FROM product WHERE product_id = :product_id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':product_id', $id);
            if($stmt->execute()) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return null;
            }
        } catch(\Throwable $th) {
            echo $th;
            return null;
        }
    }
}
?>