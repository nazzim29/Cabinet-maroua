<?php
namespace Models;
use PDO;
use PDOException;
use FFI\Exception;

class Model
{
    static protected $dbo ;
    public function __construct(){
        try{
            self::$dbo = new PDO("mysql:host=localhost;dbname=cabinet", "root", "");
            self::$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(PDOException $e){
            throw new Exception("Connexion to Database failed", 0506);
        }
    }
    static protected function db(){
        if(self::$dbo != null) return self::$dbo;
        try{
            self::$dbo = new PDO("mysql:host=localhost;dbname=cabinet", "root", "");
            self::$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$dbo;
        }catch(PDOException $e){
            throw new Exception("Connexion to Database failed", 0506);
        }
    }
}