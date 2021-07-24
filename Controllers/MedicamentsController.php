<?php

namespace Controllers;

use Models\Medicament;
use Views\View;

class MedicamentController
{

    static function index($req, $res, $service, $app)
    {
        $medicaments = Medicament::getAll();

        return View::display('medicament', array(
            'medicaments' => $medicaments,
            'error' => $service->flashes('error'),
            'success' => $service->flashes('success')
        ));
    }
    static function create($req, $res, $service, $app)
    {
        return View::display('creermedicament');
    }
    static function insert($req, $res, $service, $app)
    {
        $service->validateParam('nom', 'nom non introduit')->notNull();
        $med = new Medicament();
        $med->nom = $req->paramsPost()->get('nom');
        if($med->create()){
            $service->flash('Medicament ajouté','success');
        }else{
            $service->flash('Erreur lors de l\'ajout du medicament','error');
        }
        $res->redirect('\medicament');
    }
    static function edit($req,$res,$service,$app){
        $med = new Medicament($req->id);
        if($med->read())
            return View::display('creermedicament',Array(
                'medicament'=>$med
            ));
        $service->flash('Medicament introuvable','error');
        return $res->redirect('\medicament');
    }
    static function update($req,$res,$service,$app){
        $service->validateParam('nom', 'nom non introduit')->notNull();
        $med = new Medicament($req->id);
        $med->nom = $req->paramsPost()->get('nom');
        if($med->update()){
            $service->flash('Medicament Modifié','success');
        }else{
            $service->flash('Erreur lors de la modification','error');
        }
        $res->redirect('\medicament');

    }
    static function delete($req,$res,$service,$app)
    {
        $med = new Medicament($req->id);
        if($med->delete()) $service->flash('medicament supprimé','success');

        $res->redirect('\medicament');
    }

}
