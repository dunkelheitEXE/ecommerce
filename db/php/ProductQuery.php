<?php
class ProductQuery extends ConnectDb{
    public function SelectAllProducts() {
        try {
            //code...
            $query = "SELECT * FROM product";
            $stmt = $this->connection->prepare($query);
            $array = array();
            if($stmt->execute()) {
                $array = $stmt->fetchAll();
                return $array;
            } else {
                return "ERROR";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "ERROR DB";
        }
    }

    public function SelectOne() {
        try {
            //code...
            $query = "SELECT * FROM product ORDER BY RAND() LIMIT 1";
            $stmt = $this->connection->prepare($query);
            //$stmt->bindParam(':user_id', $id);
            if($stmt->execute()) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return "ERROR";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "ERROR DB";
        }
    }
}
?>