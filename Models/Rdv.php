<?php

namespace Models;

use DateTime;
use Error;
use PDO;

class RendezVous extends Model
{
    private $tableName = "rendez_vous";
    public function __construct($id=null)
    {
        if ($id) $this->id = $id;
    }
    public function read()
    {
        $req = self::db()->prepare("SELECT * FROM $this->tableName where ID_rendezvous = ?");
        $req->bindValue(1, $this->id);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        if (!$result) return false;
        $this->date = new Datetime($result->date);
        $this->observation = $result->observation;
        $this->ID_utilisateur = $result->ID_utilisateur;
        $this->ID_patient = $result->ID_patient;
        $this->valider_medecin = $result->valider_medecin;
        $this->patient = new Patient($this->ID_patient);
        $this->patient->read();
        return true;
    }
    static function getAll(array $where = null)
    {
        $sql = "select * from rendez_vous";
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
        foreach ($result as $value) {
            $value->date = new DateTime($value->date);
            $patient = new Patient($value->ID_patient);
            if ($patient->read()) $value->patient = $patient;
        }
        return $result;
    }
    public function update()
    {
        $req = self::db()->prepare("UPDATE $this->tableName SET `date`=?,`observation`=?,`ID_utilisateur`=?,`ID_patient`=?,valider_medecin =? WHERE ID_rendezvous = ?");
        $req->bindValue(1, $this->date->format('Y-m-d H:i'));
        $req->bindValue(2, $this->observation);
        $req->bindValue(3, $this->ID_utilisateur);
        $req->bindValue(4, $this->ID_patient);
        $req->bindValue(5, $this->valider_medecin);
        $req->bindValue(6, $this->id);
        return $req->execute();
    }
    public function create()
    {
        $req = self::db()->prepare("INSERT INTO $this->tableName (`date`,`observation`,`ID_utilisateur`,`ID_patient`,valider_medecin) values (?,?,?,?,?)");
        $req->bindValue(1, $this->date->format('Y-m-d H:i'));
        $req->bindValue(2, $this->observation);
        $req->bindValue(3, $this->ID_utilisateur);
        $req->bindValue(4, $this->ID_patient);
        $req->bindValue(5, $this->valider_medecin?'1':'0');
        return $req->execute();
    }
    public function delete()
    {
        $req = self::db()->prepare("DELETE FROM rendez_vous where ID_rendezvous = ?");
        $req->bindValue(1, $this->id);
        return $req->execute();
    }
}
