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

    public function relatedProducts() {
        $connection = new ProductQuery;
        try {
            //code...
            $results = $connection->relatedProducts();
            if($results != "ERROR") {
                $resultsJson = json_encode($results);
                echo $resultsJson;
            } else {
                echo "ERROR. SOMETHING HAS GONE WRONG";
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "ERROR. SOMETHING HAS GONE WRONG";
        }
    }

    public function SelectOne() {
        try {
            //code...
            $connection = new ProductQuery;
            $results = $connection->SelectOne();
            $resultsJson = json_encode($results);
            echo $resultsJson;
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
    }
}
?>