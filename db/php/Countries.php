<?php
class Countries extends ConnectDb{
    public function getCountries () {
        try {
            $query = "SELECT * FROM countries";
            $stmt = $this->connection->prepare($query);
            if($stmt->execute()) 
            {
                $results = $stmt->fetchAll();
                return $results;
            } else {
                return array();
            }
        } catch (\Throwable $th) {
            echo $th;
            return array();
        }
    }
}
?>