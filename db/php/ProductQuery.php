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
}
?>