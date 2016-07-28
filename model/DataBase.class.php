<?php

/**
 * Created by PhpStorm.
 * User: toni
 * Date: 27.07.16.
 * Time: 12:47
 */
class DataBase
{
    private $conn, $stmt;
    public static $_instance;

    function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=tpap", "root", "lolerpnv32");
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if (null === static::$_instance) {
            static::$_instance = new static();
        }
        return self::$_instance;
    }

    public function query($sql, $varArray)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($varArray);
        if ($this->stmt->rowCount() > 0)
            return $this->stmt->fetchAll();
        else return 0;
    }

    public function addAsset($name,$loc,$size,$private)
    {
        $user = $_SESSION['user_id'];
        $this->stmt = $this->conn->prepare("INSERT INTO asset (name,reference,size,private,user_id,downloads) VALUES(?,?,?,?,?,?)");
        $this->stmt->execute(Array($name,$loc,$size,$private,$user,0));
    }
    public function upDownloads($asset_id){
        $this->query("UPDATE asset SET downloads = downloads + 1 WHERE id=?",Array($asset_id));
    }
}