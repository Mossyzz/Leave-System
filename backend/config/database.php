<?php

class Database{
    private $host = "localhost";
    private $db = "DB_Leave";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db,$this->username,$this->password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $this->conn;
    }
}

?>