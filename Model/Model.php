<?php 

class Model {
    private PDO $bdd;

    public function __construct(){
        $this->bdd = new PDO("mysql:host=".$_ENV['dbhost'].";dbname=".$_ENV['dbname']."",
        $_ENV['login'],
        $_ENV['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getBdd(): PDO {
        return $this->bdd;
    }
}