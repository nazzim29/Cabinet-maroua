<?php
namespace Models;
use PDO;
use PDOException;
use Error;
class Users extends Model
{
    public function __construct(int $id = null)
    {
        parent::__construct();
        if ($id) $this->id = $id;
    }

    public function create()
    {
            $req = self::db()->prepare("INSERT INTO `utilisateur`(`adresse_mail`, `mot_de_passe`, `role`) VALUES (?,?,?)");
            $req->bindvalue(1, $this->adresse_mail);
            $req->bindvalue(2, password_hash($this->mot_de_passe, PASSWORD_BCRYPT, array(
                'cost' => 12,
            )));
            $req->bindvalue(3, $this->role);
            $d = $req->execute();
            $req = self::db()->prepare("SELECT LAST_INSERT_ID() as 'id';");
            $req->execute();
            $res = $req->fetch(PDO::FETCH_OBJ);
            $this->id = $res->id;
            return $d;
    }

    public function read()
    {
        try {
            $req = self::db()->prepare("select * from utilisateur where ID_utilisateur = ?");
            $req->bindvalue(1, $this->id);
            $d = $req->execute();
            $result = $req->fetch(PDO::FETCH_OBJ);
            $this->id = $result->ID_utilisateur;
            $this->role = $result->role;
            $this->adresse_mail = $result->adresse_mail;
            $this->mot_de_passe = $result->mot_de_passe;
            return $d;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function selectbyEmail(){
        try {
            $req = self::db()->prepare("select * from utilisateur where adresse_mail = ?");
            $req->bindvalue(1, $this->adresse_mail);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_OBJ);
            if(!$result) return false;
            $this->id = $result->ID_utilisateur;
            $this->role = $result->role;
            $this->adresse_mail = $result->adresse_mail;
            $this->mot_de_passe = $result->mot_de_passe;
            return true;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function verifyPass(string $pass){
        return password_verify($pass, $this->mot_de_passe);
    }
    public function update()
    {
        $req = self::db()->prepare("UPDATE `utilisateur` SET `adresse_mail`=?,`mot_de_passe`=? WHERE `ID_utilisateur`=?");
        $req->bindValue(1,$this->adresse_mail);
        $req->bindValue(2,password_hash($this->mot_de_passe,PASSWORD_BCRYPT,Array('cost'=>12)));
        $req->bindValue(3,$this->id);
        return $req->execute();
    }
    public function delete()
    {
        $req = self::db()->prepare("DELETE FROM utilisateur where ID_utilisateur = ?");
        $req->bindValue(1,$this->id);
        return $req->execute();
        
    }
}
