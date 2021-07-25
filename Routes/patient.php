<?php
use Controllers\PatientController;
$this->GET('/?',function($request,$response,$service,$app){
    PatientController::read($request,$response,$service,$app);
});
$this->GET('/[i:id]',function($request,$response,$service,$app){
    PatientController::profil($request,$response,$service,$app);
});
$this->GET('/[i:id]/rapport',function($request,$response,$service,$app){
    PatientController::rapport($request,$response,$service,$app);
});
$this->GET('/creer',function($request,$response,$service,$app){
    PatientController::getCreate($request,$response,$service,$app);
});
$this->POST('/?',function($request,$response,$service,$app){
    PatientController::create($request,$response,$service,$app);
});

$this->GET('/modifier/[i:id]',function($request,$response,$service,$app){
    PatientController::getEdit($request,$response,$service,$app);
});
$this->POST('/[i:id]',function($request,$response,$service,$app){
    PatientController::update($request,$response,$service,$app);
});

$this->DELETE('/[i:id]',function ($request,$response,$service,$app)
{
   PatientController::delete($request,$response,$service,$app); 
});