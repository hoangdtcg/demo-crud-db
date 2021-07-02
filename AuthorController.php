<?php

include_once 'DBConnect.php';
include_once 'Author.php';
class AuthorController
{
    private $dbConnect;
    private $table;
    public function __construct()
    {
        $this->table = 'authors';
        $this->dbConnect = new DBConnect();
    }

    //CRUD
    public function create($author)
    {
        var_dump($author->getFirstName());
        $sql= "INSERT INTO $this->table (`first_name`,`last_name`,`email`,`birthdate`) VALUES (:fn,:ln,:email,:dob)";
        $stmt = $this->dbConnect->connect()->prepare($sql);
        $stmt->bindParam(":fn",$author->getFirstName());
        $stmt->bindParam(":ln",$author->getLastName());
        $stmt->bindParam(":email",$author->getEmail());
        $stmt->bindParam(":dob",$author->getBirthdate());
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->dbConnect->connect()->query($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $this->convertToObject($data);
    }

    public function convertToObject($data)
    {
        $authors = [];
        foreach ($data as $item){
            $author = new Author($item->first_name,$item->last_name,$item->email, $item->birthdate);
            $author->setId($item->id);
            array_push($authors,$author);
        }
        return $authors;
    }

    public function showAllAuthor()
    {
        $authors = $this->getAll();
        include_once 'views/list.php';
    }
}