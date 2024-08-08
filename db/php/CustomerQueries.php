<?php
class CustomerQueries extends ConnectDb{
    public function signUpCustomer($name, $lastname, $email, $photo, $file, $password, $type) {
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

            $query = "INSERT INTO user 
            (user_name, user_lastname, user_email, user_photo, user_password, user_type)
            VALUES(:nombre, :apellido, :correo, :foto, :pass, :tipo)";

            $stmt = $this->connection->prepare($query);
            $array = array(
                ":nombre" => $name,
                ":apellido" => $lastname,
                ":correo" => $email,
                ":foto" => $photo,
                ":pass" => $passwordHashed,
                ":tipo" => $type
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
}
?>