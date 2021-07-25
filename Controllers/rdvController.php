<?php

namespace Controllers;

use DateTime;
use Mailer;
use Models\Patient;
use Models\RendezVous;
use Views\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class RendezVousController
{
    static function getindex($req, $res, $service, $app)
    {
        $date = new DateTime();
        if ($req->paramsGET()->get('date')) {
            $date = new DateTime($req->paramsGET()->get('date'));
        }
        $rdvs = RendezVous::getall(array(
            'YEAR(date)' => $date->format('Y'),
            'MONTH(date)' => $date->format('m'),
            'DAY(date)' => $date->format('d')
        ));
        return View::display('rdv', array(
            'error' => $service->flashes('error'),
            'success' => $service->flashes('success'),
            'date' => $date,
            'rdv' => $rdvs
        ));
    }
    static function add($req, $res, $service, $app)
    {
        $patients = Patient::getAll();
        return View::display('creerrdv', array(
            'patients' => $patients
        ));
    }
    static function create($req, $res, $service, $app)
    {
        if ($_SESSION['currentUser']->role == 'medecin') $service->validateParam('patient', 'patient incorrect')->notNull()->isInt();
        $service->validateParam('date')->notNull();
        $rdv = new RendezVous();
        if ($_SESSION['currentUser']->role == 'patient') {
            $rdv->ID_patient = $rdv->ID_utilisateur = $_SESSION['currentUser']->id;
            $rdv->observation = '';
        } else {
            $rdv->ID_patient = $rdv->ID_utilisateur = $req->paramsPost()->get('patient');
            $rdv->observation = $req->paramsPost()->get('observation');
        }
        $rdv->date = new DateTime($req->paramsPost()->get('date'));
        $rdv->valider_medecin = $_SESSION['currentUser']->role == 'medecin';
        if ($rdv->create()) {
            $service->flash('Rendez-vous enregistré', "success");
        } else {
            $service->flash('Erreur lors de l\'enregistrement du rendez-vous', 'error');
        }
        $res->redirect('\rendez-vous');
    }
    static function edit($req, $res, $service, $app)
    {
        $rdv = new RendezVous($req->id);
        if ($rdv->read()) {
            $patients = Patient::getAll();
            return View::display('creerrdv', array(
                'patients' => $patients,
                'rdv' => $rdv
            ));
        }
    }
    static function update($req, $res, $service, $app)
    {
        if ($req->paramsPost()->get('patient')) $service->validateParam('patient', 'patient incorrect')->isInt();
        $rdv = new RendezVous($req->id);
        if ($rdv->read()) {
            if ($req->paramsPost()->get('patient')) $rdv->ID_patient = $rdv->ID_utilisateur = $req->paramsPost()->get('patient');
            if ($req->paramsPost()->get('date')) $rdv->date = new DateTime($req->paramsPost()->get('date'));
            if ($req->paramsPost()->get('observation')) $rdv->observation = $req->paramsPost()->get('observation');
            if ($rdv->update()) {
                $service->flash('Modification enregistrée', "success");
            } else {
                $service->flash('Erreur llors de la modification', "error");
            }
        } else {
            $service->flash('Rendez-vous introuvable');
        }
        $res->redirect('\rendez-vous');
    }
    static function delete($req, $res, $service, $app)
    {
        $rdv = new RendezVous($req->id);
        if ($rdv->delete()) {
            $service->flash('Rendez-vous Annulé', 'success');
        } else {
            $service->flash('Erreur lors de l\'annulation du rendez-vous', 'error');
        }
        $res->redirect('\rendez-vous');
    }
    static function valider($req, $res, $service, $app)
    {

        $rdv = new RendezVous($req->id);
        $rdv->read();
        $rdv->valider_medecin = true;
        $rdv->update();
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'dzpower19@gmail.com';                     //SMTP username
            $mail->Password   = 'NAZIMANAHOWA';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet = "UTF-8";
            //Recipients
            $mail->setFrom('Dr.houaoui@example.com', 'DR. HOUAOUI');
            $mail->addAddress($rdv->patient->adresse_mail);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Confirmation du Rendez-vous chez DR. Houaoui';
            $mail->Body    = "votre Rendez-vous chez DR. Houaoui pour le " . $rdv->date->format('d/m/Y') . " a " . $rdv->date->format('H:i') . " a ete confirmé";
            $mail->AltBody = "votre Rendez-vous chez DR. Houaoui pour le " . $rdv->date->format('d/m/Y') . " a " . $rdv->date->format('H:i') . " a ete confirmé";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $res->redirect('\rendez-vous');
    }
}
