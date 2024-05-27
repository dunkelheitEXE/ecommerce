<?php
class ConnectDb {
    // Attributes
    private $host = "localhost";
    private $dbname = "ecommerce";
    private $dbusername = "root";
    private $dbpassword = "123456789";
    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
        $this->connection = new PDO($dsn, $this->dbusername, $this->dbpassword);
    }

    public function verifyConnection() {
        try {
            if($this->connection) {
                return "Connection done successfully";
            } else {
                return "Connection Failed, Verify your configuration";
            }
        } catch (\Throwable $th) {
            //throw $th;
            return "Connection Failed, Verify your configuration<br><b>Type of error</b>: ".$th;
        }
    }
}
?>