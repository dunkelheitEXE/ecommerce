<?php
require "db/php/ProductQuery.php";
class ProductController {
    public function SelectAll() {
        $connection = new ProductQuery;
        try {
            //code...
            $results = $connection->SelectAllProducts();
            if($results == "ERROR DB") {
                echo "SOMETHING HAS GONE WRONG";
            } else {
                $resultsJson = json_encode($results);
                echo $resultsJson;
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
    }
}
?>