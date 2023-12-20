<?php
class DatabaseConnection
{
    private static $instance; 
    public $conn;

 
    private function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if (!$this->conn) {
            die("<h1>Conexão não funcionou</h1>");
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
?>

