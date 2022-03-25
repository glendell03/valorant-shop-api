<?php 

class Database {
    private $host = 'sql309.epizy.com';
    private $db_name = 'epiz_31371144_valorantshopapi';
    private $username = 'epiz_31371144';
    private $password = 'Xa0zw8EQBiGFzn';

    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec('set names utf8');
        } catch (PDOException $e) {
            echo "Database could not connect" . $e->getMessage();
        }
        return $this->conn;
    }


}



