<?php
use Controllers\MedicamentController;

$this->GET('/?',function($req,$res,$service,$app)
{
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    MedicamentController::index($req,$res,$service,$app);
});
$this->POST('/?',function($req,$res,$service,$app)
{
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    MedicamentController::insert($req,$res,$service,$app);
});
$this->POST('/[i:id]',function($req,$res,$service,$app)
{
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    MedicamentController::update($req,$res,$service,$app);
});
$this->DELETE('/[i:id]',function($req,$res,$service,$app)
{
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    MedicamentController::delete($req,$res,$service,$app);
});
$this->GET('/creer',function($req,$res,$service,$app)
{
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    MedicamentController::create($req,$res,$service,$app);
});
$this->GET('/modifier/[i:id]',function($req,$res,$service,$app)
{
    if($_SESSION['currentUser']->role == "patient") return $service->back();
    MedicamentController::edit($req,$res,$service,$app);
});