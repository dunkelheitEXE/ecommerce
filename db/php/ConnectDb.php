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

    public static function EncryptData($data) {
        $secretKey = 'cerdo cabeza toro no placentero queso irritante flashing light at agujero black perr$ $alvaje';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        
        $cipher = 'AES-256-CBC';
        $encrypted = openssl_encrypt($data, $cipher, $secretKey, 0, $iv);
        return $encrypted;
    }

    public static function DecryptData($encrypted) {
        $secretKey = 'cerdo cabeza toro no placentero queso irritante flashing light at agujero black perr$ $alvaje';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        $cipher = 'AES-256-CBC';

        $decrypted = openssl_decrypt($encrypted, $cipher, $secretKey, 0, $iv);
        return $decrypted;
    }
}
?>