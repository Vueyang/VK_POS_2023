<?php
class config_db{
    private $host;
    private $database;
    private $username;
    private $password;
    private $port;

    public $conn;
    public function __construct($host, $database, $username, $password, $port){
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
    }
    public function connections(){
        $this->conn  = null;
        try{
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";
                database = " . $this->database . ";
                username = " . $this->username . ";
                password = " . $this->password . ";
                post = " . $this->port . ";
                "
            );
        }catch(PDOException $e){
            $this->conn = "Connection database error " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>