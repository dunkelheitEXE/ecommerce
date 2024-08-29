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

    public function relatedProducts() {
        try {
            //code...
            $query = "SELECT * FROM product LIMIT 8";
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

    public function productMediaPrice() {
        try {
            $query = "SELECT AVG(product_price) AS media_price FROM product";
            $stmt = $this->connection->prepare($query);
            if($stmt->execute()) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return array();
            }
        } catch(\Throwable $th) {
            return array("media_price" => $th);
        }
    }

    public function productMinorPrice() {
        try {
            $query = "SELECT MIN(product_price) AS minor FROM product";
            $stmt = $this->connection->prepare($query);
            if($stmt->execute()) {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            } else {
                return array();
            }
        } catch(\Throwable $th) {
            return array("minor" => $th);
        }
    }
}
?>