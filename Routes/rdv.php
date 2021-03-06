<?php

use Controllers\RendezVousController;

$this->GET('/?',function($req,$res,$service,$app){
    RendezVousController::getindex($req,$res,$service,$app);
});
$this->POST('/?',function($req,$res,$service,$app){
    RendezVousController::create($req,$res,$service,$app);
});
$this->POST('/[i:id]',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    RendezVousController::update($req,$res,$service,$app);
});
$this->GET('/creer',function($req,$res,$service,$app){
    RendezVousController::add($req,$res,$service,$app);
});
$this->GET('/modifier/[i:id]',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    RendezVousController::edit($req,$res,$service,$app);
});
$this->GET('/valider/[i:id]',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    RendezVousController::valider($req,$res,$service,$app);
});

$this->DELETE('/[i:id]',function($req,$res,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    RendezVousController::delete($req,$res,$service,$app);
});