<?php

use Controllers\PrescriptionController;

$this->GET('/?',function($req,$res,$service,$app){
    PrescriptionController::index($req,$res,$service,$app);
});
$this->POST('/?',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PrescriptionController::insert($req,$res,$service,$app);
});
$this->POST('/[i:id_medicament]_[i:id_patient]',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PrescriptionController::update($req,$res,$service,$app);
});
$this->DELETE('/[i:id_medicament]_[i:id_patient]',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PrescriptionController::delete($req,$res,$service,$app);
});
$this->GET('/creer',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PrescriptionController::create($req,$res,$service,$app);
});
$this->GET('/modifier/[i:id_medicament]_[i:id_patient]',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PrescriptionController::edit($req,$res,$service,$app);
});
