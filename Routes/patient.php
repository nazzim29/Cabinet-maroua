<?php
use Controllers\PatientController;
$this->GET('/?',function($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PatientController::read($request,$response,$service,$app);
});
$this->GET('/[i:id]',function($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient" && $_SESSION['currentUser']->id != $request->id) return $service->back();
    PatientController::profil($request,$response,$service,$app);
});
$this->GET('/[i:id]/rapport',function($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient" && $_SESSION['currentUser']->id != $request->id) return $service->back();
    PatientController::rapport($request,$response,$service,$app);
});
$this->GET('/creer',function($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PatientController::getCreate($request,$response,$service,$app);
});
$this->POST('/?',function($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PatientController::create($request,$response,$service,$app);
});

$this->GET('/modifier/[i:id]',function($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PatientController::getEdit($request,$response,$service,$app);
});
$this->POST('/[i:id]',function($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    PatientController::update($request,$response,$service,$app);
});

$this->DELETE('/[i:id]',function ($request,$response,$service,$app){
    if($_SESSION['currentUser']->role == "patient") return $service->back();
   PatientController::delete($request,$response,$service,$app); 
});