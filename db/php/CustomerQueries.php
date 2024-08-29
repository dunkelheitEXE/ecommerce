<?php
class CustomerQueries extends ConnectDb{
    public function signUpCustomer($name, $lastname, $email, $photo, $file, $password) {
        $concat = "";
        try {
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
            try {
                if(!empty($photo)) {
                    move_uploaded_file($file, 'static/img/' . $photo);
                }
            } catch(\Throwable $f) {
                $concat = $f->getMessage();
            }

            $query = "INSERT INTO buyer 
            (buyer_name, buyer_lastname, buyer_email, buyer_photo, buyer_password)
            VALUES(:nombre, :apellido, :correo, :foto, :pass)";

            $stmt = $this->connection->prepare($query);
            $array = array(
                ":nombre" => $name,
                ":apellido" => $lastname,
                ":correo" => $email,
                ":foto" => $photo,
                ":pass" => $passwordHashed
            );

            if($stmt->execute($array)) {
                return "OK";
            } else {
                return "SOMETHING HAS GONE WRONG, CHECK YOUR VALUES OR CONTACT US IN ... \n" . $concat;
            }
        } catch (\Throwable $th) {
            return $th->getMessage() . "\n" . $concat;
        }
    }

    public function loginCus($email, $password) {
        try {
            $query = "SELECT * FROM buyer WHERE buyer_email = :email";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(":email", $email);
            if($stmt->execute()) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                if(count($results) > 0 && password_verify($password, $results['buyer_password'])) {
                    return $results;
                } else {
                    return array();
                }
            } else {
                return array();
            }
        } catch(\Throwable $th) {
            return array();
        }
    }

    public function buyProduct($id_customer, $id_seller, $id_product) {
        try {
            $query = "INSERT INTO sale(
            sale_seller,
            sale_product,
            sale_buyer,
            sale_date) VALUES(
            :seller,
            :product,
            :buyer,
            CURRENT_DATE()
            )";

            $stmt = $this->connection->prepare($query);
            $array = array(
                ":seller" => $id_seller,
                ":product" => $id_product,
                ":buyer" => $id_customer
            );

            if($stmt->execute($array)) {
                return "OK";
            } else {
                return "SOMETHING HAS GONE WRONG";
            } 
        } catch(\Throwable $th) {
            return $th->getMessage();
        }
    }
}
?>