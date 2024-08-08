<?php
require "db/php/FormQueries.php";
class FormController {
    public static function getCountries() {
        try {
            $connection = new FormQueries;
            $results = $connection->getCountries();
            if(!empty($results)) {
                foreach($results as $key) {
                    echo "
                        <option value='" . $key['country_name'] . "'>" . $key['country_name'] . "</option>
                    ";
                }
            } else {
                echo "<option value=''>SOMETHIGN HAS GONE WRONG</option>";
            }
        } catch(\Throwable $th) {
            echo "<option value=''>" . $th->getMessage() . "</option>";
        }
    }
}
?>