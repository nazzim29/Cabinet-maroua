<?php
namespace Models;

use Error;
use PDO;
class Patient Extends Users
{
    static $tableName = "patient";
    public function _contruct($id)
    {
        $this->tableName = 'patient';
        parent::__construct();
        if($id) $this->id = $id;
    }
    public function read()
    {
        $req = self::db()->prepare("select * from ".self::$tableName." where ID_patient = ?");
        $req->bindValue(1,$this->id);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        if(!$result) return false;
        $this->ID_utilisateur = $result->ID_utilisateur;
        $this->nom = $result->nom;
        $this->prenom = $result->prenom;
        $this->age = $result->age;
        $this->taille = $result->taille;
        $this->poids = $result->poids;
        $this->numero_de_telephone = $result->numero_de_telephone;
        $this->note = $result->note;
        return true;
    }
    static function getAll(Array $where = null)
    {
        $sql = "select * from patient";
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
        $req = self::db()->prepare("UPDATE `patient` SET `nom`=?,`prenom`=?,`age`=?,`taille`=?,`poids`=?,`numero_de_telephone`=?,`note`=? WHERE `ID_patient`=?");
        $req->bindValue(1,$this->nom);
        $req->bindValue(2,$this->prenom);
        $req->bindValue(3,$this->age);
        $req->bindValue(4,$this->taille);
        $req->bindValue(5,$this->poids);
        $req->bindValue(6,$this->numero_de_telephone);
        $req->bindValue(7,$this->note);
        $req->bindValue(8,$this->id);
        return $req->execute();
        
    }
    public function create()
    {
        $req = self::db()->prepare("INSERT INTO `patient`(`ID_utilisateur`,ID_patient, `nom`, `prenom`, `age`, `taille`, `poids`, `numero_de_telephone`, `note`) VALUES (?,?,?,?,?,?,?,?,?)");
        $req->bindValue(1,$this->id);
        $req->bindValue(2,$this->id);
        $req->bindValue(3,$this->nom);
        $req->bindValue(4,$this->prenom);
        $req->bindValue(5,$this->age);
        $req->bindValue(6,$this->taille);
        $req->bindValue(7,$this->poids);
        $req->bindValue(8,$this->numero_de_telephone);
        $req->bindValue(9,$this->note);
        return $req->execute();

    }
    public function delete()
    {
        $req = self::db()->prepare("DELETE FROM $this->tableName where ID_patient = ?");
        $req->bindValue(1,$this->ID_patient);
        return $req->execute();
        
    }
    static function fromUser(Users $user){
        $patient = new Patient($user->id);
        $patient->adresse_mail = $user->adresse_mail;
        $patient->mot_de_passe = $user->mot_de_passe;
        $patient->role = $user->role;
        return $patient;
    }
}
