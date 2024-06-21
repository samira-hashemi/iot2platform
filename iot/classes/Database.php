<?php 
    class Database {
        private $host = "localhost";
        private $database = "samiraha_alldata";
        private $username = "samiraha_alldatauser";
        private $password = "hYVJa6ABQn(n";
        public $conn;
    public function __construct(){
        try {
            $this->conn = new mysqli ($this->host, $this->username, $this->password,$this->database);
        } catch (mysqli_sql_exception $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
    }
    }  
?>