<?php

namespace Models;

use DateTime;
use PDO;
use PDOException;

class Prescription extends Model
{
    private $tableName = "prescri";
    public function __construct($id_medicament, $id_patient)
    {
        if ($id_medicament) $this->ID_medicament= $id_medicament;
        if ($id_patient) $this->id = $id_patient;
    }

    public function read()
    {
        $req = self::db()->prepare("select * from $this->tableName where  ID_patient = ? and  ID_medicament = ? ");
        $req->bindValue(1, $this->id);
        $req->bindValue(2, $this->ID_medicament);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        if (!$result) return false;
        $this->dose= $result->dose;
        $this->date_debut= new Datetime($result->date_debut);
        $this->date_fin= new Datetime($result->date_fin);
        $this->avant_apres= $result->avant_apres;
        $this->prise_jour= $result->prise_jour;
        return true;
    }
    static function getAll(array $where = null)
    {
        $sql = "select * from prescri";
        if ($where) {
            $sql .= " where ";
            $i = 0;
            foreach ($where as $key => $value) {
                $sql .= "$key = $value";
                if ($i++ != count($where)-1) $sql .= " and ";
            }
        }
        $req = self::db()->prepare($sql);
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_OBJ);
        if (!$result) return false;
        foreach ($result as $key => $value) {
            $value->date_fin = new DateTime($value->date_fin);
            $value->date_debut = new DateTime($value->date_debut);
            $patient = new Patient($value->ID_patient);
            if ($patient->read()) $value->patient = $patient;
            $medicament = new Medicament($value->ID_medicament);
            if ($medicament->read()) $value->medicament = $medicament;
        }
        return $result;
    }
    public function update($id_medicament, $id_patient)
    {

        $req = self::db()->prepare("UPDATE $this->tableName SET `dose`=?,`date_debut`=?,`date_fin`=?,`prise_jour`=?,`avant_apres`=?, ID_patient=?,ID_utilisateur=?,ID_medicament = ? where  ID_patient = ? and ID_medicament = ? ");
        $req->bindValue(1, $this->dose);
        $req->bindValue(2, $this->date_debut);
        $req->bindValue(3, $this->date_fin);
        $req->bindValue(4, $this->prise_jour);
        $req->bindValue(5, $this->avant_apres);
        $req->bindValue(6, $this->id);
        $req->bindValue(7, $this->id);
        $req->bindValue(8, $this->ID_medicament);
        $req->bindValue(9, $id_patient);
        $req->bindValue(10, $id_medicament);
        return $req->execute();
    }
    public function create()
    {
        $req = self::db()->prepare("INSERT INTO `prescri`( `dose`, `date_debut`, `date_fin`, `prise_jour`, `avant_apres`, `ID_patient`,`ID_medicament`,`ID_utilisateur`) VALUES (?,?,?,?,?,?,?,?)");
        $req->bindValue(1, $this->dose);
        $req->bindValue(2, $this->date_debut);
        $req->bindValue(3, $this->date_fin);
        $req->bindValue(4, $this->prise_jour);
        $req->bindValue(5, $this->avant_apres);
        $req->bindValue(6, $this->id);
        $req->bindValue(7, $this->ID_medicament);
        $req->bindValue(8, $this->id);
        return $req->execute();
    }
    public function delete()
    {
        $req = self::db()->prepare("DELETE FROM $this->tableName where ID_patient  = ? and  ID_medicament = ? and ID_utilisateur = ?");
        $req->bindValue(1, $this->id);
        $req->bindValue(2, $this->ID_medicament);
        $req->bindValue(3, $this->id);
        return $req->execute();
    }
}
