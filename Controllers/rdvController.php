<?php

namespace Controllers;

use DateTime;
use Models\Patient;
use Models\RendezVous;
use Views\View;

class RendezVousController {
    static function getindex($req,$res,$service,$app)
    {
        $date = new DateTime();
        if($req->paramsGET()->get('date')){            
            $date = new DateTime($req->paramsGET()->get('date'));
        }
        $rdvs = RendezVous::getall(Array(
            'YEAR(date)' =>$date->format('Y'),
            'MONTH(date)' =>$date->format('m'),
            'DAY(date)' =>$date->format('d')
        ));
        return View::display('rdv',array(
            'error' =>$service->flashes('error'),
            'success' => $service->flashes('success'),
            'date' => $date,
            'rdv' => $rdvs
        ));
    }
    static function add($req,$res,$service,$app)
    {
        $patients = Patient::getAll();
        return View::display('creerrdv',Array(
            'patients'=>$patients
        ));
    }
    static function create($req,$res,$service,$app){
        if($_SESSION['currentUser']->role == 'medecin') $service->validateParam('patient','patient incorrect')->notNull()->isInt();
        $service->validateParam('date')->notNull();
        $rdv = new RendezVous();
        if($_SESSION['currentUser']->role == 'patient'){
            $rdv->ID_patient = $rdv->ID_utilisateur = $_SESSION['currentUser']->id;
            $rdv->observation = '';
        }else{
            $rdv->ID_patient = $rdv->ID_utilisateur = $req->paramsPost()->get('patient');
            $rdv->observation = $req->paramsPost()->get('observation');
        }
        $rdv->date = new DateTime($req->paramsPost()->get('date'));
        $rdv->valider_medecin = $_SESSION['currentUser']->role == 'medecin';
        if($rdv->create()){
            $service->flash('Rendez-vous enregistré',"success");

        }else{
           $service->flash('Erreur lors de l\'enregistrement du rendez-vous','error');
        }
        $res->redirect('\rendez-vous');
    }
    static function edit($req,$res,$service,$app)
    {
        $rdv = new RendezVous($req->id);
        if($rdv->read()){
            $patients = Patient::getAll();
            return View::display('creerrdv',Array(
                'patients'=>$patients,
                'rdv'=>$rdv
            ));
        }
    }
    static function update($req,$res,$service,$app)
    {
        if($req->paramsPost()->get('patient')) $service->validateParam('patient','patient incorrect')->isInt();
        $rdv = new RendezVous($req->id);
        if($rdv->read()){
            if($req->paramsPost()->get('patient')) $rdv->ID_patient = $rdv->ID_utilisateur = $req->paramsPost()->get('patient');
            if($req->paramsPost()->get('date')) $rdv->date = new DateTime($req->paramsPost()->get('date'));
            if($req->paramsPost()->get('observation')) $rdv->observation = $req->paramsPost()->get('observation');
            if($rdv->update()){
                $service->flash('Modification enregistrée',"success");
            }else{
                $service->flash('Erreur llors de la modification',"error");
            }
        }else{
            $service->flash('Rendez-vous introuvable');
        }
        $res->redirect('\rendez-vous');
    }
    static function delete($req,$res,$service,$app)
    {
        $rdv = new RendezVous($req->id);
        if($rdv->delete()){
            $service->flash('Rendez-vous Annulé','success');
        }else{
            $service->flash('Erreur lors de l\'annulation du rendez-vous','error');
        }
        $res->redirect('\rendez-vous');
    }
    static function valider($req,$res,$service,$app){
        $rdv = new RendezVous($req->id);
        $rdv->read();
        $rdv->valider_medecin = true;
        $rdv->update();
        $res->redirect('\rendez-vous');

    }
}