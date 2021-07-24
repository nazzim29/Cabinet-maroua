<?php

namespace Models;

use PDO;

class Medicament extends Model
{
    private $tableName = "medicaments";
    public function __construct($id=null)
    {
        if ($id) $this->id = $id;
    }
    public function read()
    {
        $req = self::db()->prepare("select * from $this->tableName where ID_medicament = ?");
        $req->bindValue(1, $this->id);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        if (!$result) return false;
        $this->nom = $result->nom;
        return true;
    }
    static function getAll(array $where = null)
    {
        $sql = "select * from medicaments";
        if($where){

            $sql .= " where ";
            $i = 0;
            foreach ($where as $key => $value) {
                $sql.="$key = $value";
                if($i++ != count($where)) $sql .= " and ";
            }
        }
        $req = self::db()->prepare($sql);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_OBJ);
            if(!$result) return false;
            return $result;
    }
    public function update()
    {
        $req = self::db()->prepare("update $this->tableName SET nom = ? where ID_medicament =?");
        $req->bindValue(1, $this->nom);
        $req->bindValue(2, $this->id);
        return $req->execute();
    }
    public function create()
    {
        $req = self::db()->prepare("INSERT INTO $this->tableName (Nom) values(?)");
        $req->bindValue(1, $this->nom);
        return $req->execute();
    }
    public function delete()
    {
        $req = self::db()->prepare("DELETE FROM $this->tableName where ID_medicament = ?");
        $req->bindValue(1, $this->id);
        return $req->execute();
    }
}
