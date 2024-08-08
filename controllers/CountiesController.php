<?php
require "db/php/Countries.php";
class CountriesController{
    public function getCountries() {
        $connection = new Countries;
        $results = $connection->getCountries();
        if(!empty($results)) {
            foreach($results as $key) {
                echo '<option value="' . $key['country_name'] . '">' . $key['country_name'] . '</option>';
            }
        }
    }
}
?>