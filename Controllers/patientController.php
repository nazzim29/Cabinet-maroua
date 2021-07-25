<?php

namespace Controllers;

use Models\Patient;
use Models\Prescription;
use Models\RendezVous;
use Models\Users;
use Views\View;
use Mpdf\Mpdf;
use Mpdf\HTMLParserMode;

class PatientController
{
    static function create($req, $res, $service, $app)
    {
        $service->validateParam('adresse_mail', 'please enter a valid email')->notNull()->isEmail();
        $service->validateParam('mot_de_passe', 'please enter a valid password')->notNull()->isLen(3, 32);
        $service->validateParam('nom', 'nom inchoerant')->notNull()->isAlpha();
        $service->validateParam('prenom', 'prenom incoherant')->notNull()->isAlpha();
        $service->validateParam('age', 'age')->notNull()->isInt();
        $service->validateParam('taille', 'taille')->notNull()->isFloat();
        $service->validateParam('poids', 'poids')->notNull()->isFloat();
        $service->validateParam('note', 'note')->notNull();
        $service->validateParam('numero_de_telephone', 'num')->notNull()->isChars('0-9+');
        $patient = new Users();
        $patient->adresse_mail = $req->paramsPost()->get("adresse_mail");
        $patient->mot_de_passe = $req->paramsPost()->get("mot_de_passe");
        $patient->role = "patient";
        if ($patient->create()) {
            $patient = Patient::fromUser($patient);
            $patient->nom = $req->paramsPost()->get("nom");
            $patient->prenom = $req->paramsPost()->get("prenom");
            $patient->age = $req->paramsPost()->get("age");
            $patient->taille = $req->paramsPost()->get("taille");
            $patient->poids = $req->paramsPost()->get("poids");
            $patient->note = $req->paramsPost()->get("note");
            $patient->numero_de_telephone = $req->paramsPost()->get("numero_de_telephone");
            if ($patient->create()) {
                $service->flash('patient crée avec success', 'success');
            } else {
                $service->flash('erreur lors de la creation du patient', 'error');
            }
            $res->redirect('patient');
        }
    }
    static function read($req, $res, $service, $app)
    {
        $patient = new Patient();
        if ($req->id) {
            $service->validate($req->id, 'id invalid')->isInt();
            $patient = new Patient($req->id);
            if ($patient->read()) {
                View::display('profilepatient', array(
                    'patient' => $patient,
                ));
            }
        } else {
            if ($patients = $patient->getAll()) return View::display('patient', array(
                'patients' => $patients,
                'success' => $service->flashes('success'),
                'error' => $service->flashes('error')
            ));
            return View::display('patient', array(
                'success' => $service->flashes('success'),
                'error' => $service->flashes('error')
            ));
        }
    }
    static function update($req, $res, $service, $app)
    {
        $service->validateParam('adresse_mail', 'please enter a valid email')->notNull()->isEmail();
        if ($req->paramsPost()->get('mot_de_passe')) $service->validateParam('mot_de_passe')->isLen(3, 32);
        $service->validateParam('nom')->isAlpha();
        $service->validateParam('prenom')->isAlpha();
        $service->validateParam('age')->isInt();
        $service->validateParam('taille')->isFloat();
        $service->validateParam('poids')->isFloat();
        $service->validateParam('numero_de_telephone')->isChars('0-9+');
        $service->validate($req->id, 'id invalid')->isInt();
        $patient = new Users($req->id);
        if ($patient->read()) {
            if ($req->paramsPost()->get("adresse_mail")) $patient->adresse_mail = $req->paramsPost()->get("adresse_mail");
            if ($req->paramsPost()->get("mot_de_passe")) $patient->mot_de_passe = $req->paramsPost()->get("mot_de_passe");
            if ($patient->update()) {
                $patient = Patient::fromUser($patient);
                if ($req->paramsPost()->get("note")) $patient->note = $req->paramsPost()->get("note");
                if ($req->paramsPost()->get("nom")) $patient->nom = $req->paramsPost()->get("nom");
                if ($req->paramsPost()->get("prenom")) $patient->prenom = $req->paramsPost()->get("prenom");
                if ($req->paramsPost()->get("age")) $patient->age = $req->paramsPost()->get("age");
                if ($req->paramsPost()->get("taille")) $patient->taille = $req->paramsPost()->get("taille");
                if ($req->paramsPost()->get("poids")) $patient->poids = $req->paramsPost()->get("poids");
                if ($req->paramsPost()->get("numero_de_telephone")) $patient->numero_de_telephone = $req->paramsPost()->get("numero_de_telephone");
                if ($patient->update()) {
                    $service->flash('patient modifié avec success', 'success');
                } else {
                    $service->flash('erreur lors de la modification', 'error');
                }
            } else {
                $service->flash('erreur lors de la modification', 'error');
            }
            $res->redirect("/patient");
        } else {
            View::display('not-found');
        }
    }
    static function delete($req, $res, $service, $app)
    {
        $service->validate($req->id, 'id invalid')->isInt();
        $patient = new Users($req->id);
        if ($patient->delete()) {
            $service->flash('patient suprimé', 'success');
        } else {
            $service->flash('erreur lors de la supression du patient', 'error');
        }
    }
    static function getCreate($request, $response, $service, $app)
    {
        return View::display('creerpatient');
    }
    static function getEdit($req, $res, $service, $app)
    {
        $patient = new Users($req->id);
        if ($patient->read()) {
            $patient = Patient::fromUser($patient);
            if ($patient->read()) {
                return View::display('creerpatient', array(
                    'patient' => $patient
                ));
            }
        }
        $service->flash('patient introuvable', 'error');
        $res->redirect('/patient');
    }
    static function profil($req, $res, $service, $app)
    {
        $patient = new Users($req->id);
        $patient->read();
        $patient = Patient::fromUser($patient);
        $patient->read();
        return View::display('profilpatient', array(
            'patient' => $patient,
            'prescriptions' => Prescription::getAll(array('ID_patient' => $req->id)),
            'rdvs' => RendezVous::getAll(array('ID_patient' => $req->id))
        ));
    }
    static function rapport($req, $res, $service, $app)
    {
        $patient = new Patient($req->id);
        $patient->read();
        $rdvs = RendezVous::getAll(array('ID_patient' => $req->id));
        $pdf = new  Mpdf();
        $html = '
            <html lang="en">
            <style>
                button {
                    border-radius: 20px;
                    border: 1px solid #148f8a;
                    background-color: #148f8a;
                    color: #FFFFFF;
                    font-size: 12px;
                    font-weight: bold;
                    padding: 12px 45px;
                    letter-spacing: 1px;
                    text-transform: uppercase;
                    transition: transform 80ms ease-in;
                }
            </style>
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Rapport de suivi '.$patient->nom.' '.$patient->prenom.'</title>
                <!--
            
            
                -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
                <!-- https://fonts.google.com/specimen/Open+Sans -->
                <link rel="stylesheet" href="\public/css/fontawesome.min.css">
                <!-- https://fontawesome.com/ -->
                <!-- https://getbootstrap.com/ -->
                <link rel="stylesheet" href="\public/css/tooplate.css">
            </head>
            
            <body id="reportsPage" style="background-image:none;">
                <div class="" id="home">
                    <div class="container">
                        <div class="row tm-content-row tm-mt-big">
                            <div class="tm-col tm-col-medium">
                                <div class="bg-white tm-block">
                                    <h2 class="tm-block-title">Rapport de suivi</h2>
                                    <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                        <thead>
                                            <tr class="tm-bg-gray">
            
                                                <th scope="col">Date </th>
                                                <th scope="col" class="text-center">Observation </th>
            
                                            </tr>
                                        </thead>
                                        <tbody>';



            
        foreach ($rdvs as $rdv) {
            $html .= "<tr><td>" . $rdv->date->format('d/m/Y') . "</td><td>";
            if(strlen($rdv->observation)!=0) $html .= $rdv->observation;
            else $html.= 'Aucune observation';
            $html.= "</td></tr>";
        }
        $html.="</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                </div>
            
            </body>
            
            </html>
        ";
        $pdf->WriteHTML($html,0);
        $pdf->Output();
    }
}
