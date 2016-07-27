<?php

/**
 * Created by PhpStorm.
 * User: toni
 * Date: 27.07.16.
 * Time: 12:47
 */
class DataBase
{
    private $conn,$stmt;
    public static $_instance;

    private function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=tpap","root", "lolerpnv32");
    }
    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if(null === static::$_instance){
            static::$_instance = new static();
        }
        return self::$_instance;
    }
    public function query($sql,$varArray)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($varArray);
        return $this->stmt->fetchAll();
    }
}