<?php

require_once "config.php";

class Database
{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct()
    {
        $this->username = config::USERNAME;
        $this->password = config::PASSWORD;
        $this->host = config::HOST;
        $this->database = config::DATABASE;
    }

    public function connect()
    {
        try
        {
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode" => "prefer"]
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e)
        {
            die("Connection failed".$e->getMessage());
        }
    }
}