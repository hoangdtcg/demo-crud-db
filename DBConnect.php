<?php


class DBConnect
{
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=demodb;charset=utf8";
        $this->username = "root";
        $this->password = "root";
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn,$this->username,$this->password);
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }
}