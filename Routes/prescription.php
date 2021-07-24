<?php

use Controllers\PrescriptionController;

$this->GET('/?',function($req,$res,$service,$app){
    PrescriptionController::index($req,$res,$service,$app);
});
$this->POST('/?',function($req,$res,$service,$app){
    PrescriptionController::insert($req,$res,$service,$app);
});
$this->POST('/[i:id_medicament]_[i:id_patient]',function($req,$res,$service,$app){
    PrescriptionController::update($req,$res,$service,$app);
});
$this->DELETE('/[i:id_medicament]_[i:id_patient]',function($req,$res,$service,$app){
    PrescriptionController::delete($req,$res,$service,$app);
});
$this->GET('/creer',function($req,$res,$service,$app){
    PrescriptionController::create($req,$res,$service,$app);
});
$this->GET('/modifier/[i:id_medicament]_[i:id_patient]',function($req,$res,$service,$app){
    PrescriptionController::edit($req,$res,$service,$app);
});
