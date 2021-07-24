<?php

namespace Controllers;

use Models\Medicament;
use Models\Patient;
use Views\View;
use Models\Prescription;

class PrescriptionController
{

    static function index($req, $res, $service, $app)
    {
        $selectval = null;
        $pr = null;

        if (intval($req->patient)) {
            $selectval = $req->patient;
            $pr = Prescription::getAll(array('ID_patient' => $selectval));
        }
        return View::display('prescription', array(
            'selectval' => $selectval,
            'prescriptions' => $pr,
            'error' => $service->flashes('error'),
            'success' => $service->flashes('success'),
            'patients' => Patient::getAll()
        ));
    }
    static function create($req, $res, $service, $app)
    {
        return View::display('creerprescription', array(
            'patients' => Patient::getAll(),
            'medicaments' => Medicament::getAll()
        ));
    }
    static function insert($req, $res, $service, $app)
    {
        $service->validateParam('patient', 'patient requi')->notNull();
        $service->validateParam('medicament', 'medicament requi')->notNull();
        $service->validateParam('dose', 'dose requi')->notNull();
        $service->validateParam('date_debut', 'date_debut requi')->notNull();
        $service->validateParam('date_fin', 'date_fin requi')->notNull();
        $service->validateParam('prise_jour', 'prise_jour requi')->notNull();
        $service->validateParam('quand', 'quand requi')->notNull();

        $pre = new Prescription($req->paramsPost()->get('medicament'), $req->paramsPost()->get('patient'));
        $pre->dose = $req->paramsPost()->get('dose');
        $pre->date_debut = $req->paramsPost()->get('date_debut');
        $pre->date_fin = $req->paramsPost()->get('date_fin');
        $pre->prise_jour = $req->paramsPost()->get('prise_jour');
        $pre->avant_apres = $req->paramsPost()->get('quand');
        if ($pre->create()) {
            $service->flash('creation de la prescription reussi', 'success');
        } else {
            $service->flash('erreur lord de la creation de la prescription', 'error');
        }
        $res->redirect('\prescription');
    }
    static function edit($req, $res, $service, $app)
    {
        $pre = new Prescription($req->id_medicament, $req->id_patient);
        if ($pre->read()) {
            return View::display('creerprescription', array(
                'patients' => Patient::getAll(),
                'medicaments' => Medicament::getAll(),
                'prescription' => $pre
            ));
        } else {
            $service->flash('prescription introuvable', "error");
        }
    }
    static function update($req, $res, $service, $app)
    {

        $service->validateParam('patient', 'patient requi')->notNull();
        $service->validateParam('medicament', 'medicament requi')->notNull();
        $service->validateParam('dose', 'dose requi')->notNull();
        $service->validateParam('date_debut', 'date_debut requi')->notNull();
        $service->validateParam('date_fin', 'date_fin requi')->notNull();
        $service->validateParam('prise_jour', 'prise_jour requi')->notNull();
        $service->validateParam('quand', 'quand requi')->notNull();

        $pre = new Prescription($req->id_medicament, $req->id_patient);

        if ($pre->read()) {
            
            if($req->paramsPost()->get('medicament')) $pre->ID_medicament = $req->paramsPost()->get('medicament');
            if($req->paramsPost()->get('patient')) $pre->id = $req->paramsPost()->get('patient');
            if($req->paramsPost()->get('dose')) $pre->dose = $req->paramsPost()->get('dose');
            if($req->paramsPost()->get('date_debut')) $pre->date_debut = $req->paramsPost()->get('date_debut');
            if($req->paramsPost()->get('date_fin')) $pre->date_fin = $req->paramsPost()->get('date_fin');
            if($req->paramsPost()->get('prise_jour')) $pre->prise_jour = $req->paramsPost()->get('prise_jour');
            if($req->paramsPost()->get('quand')) $pre->avant_apres = $req->paramsPost()->get('quand');
            if($pre->update($req->id_medicament, $req->id_patient)){
                $service->flash('modfié avec success','success');
            }else{
                $service->flash('erreur lors de la modification','error');
            }
        }else{
            $service->flash('prescription introuvable','error');
        }
        $res->redirect('\prescription');
    }
    static function delete($req,$res,$service,$app){
        $pre = new Prescription($req->id_medicament,$req->id_patient);
        $pre->delete();
        $res->redirect('\prescription');
    }
}
