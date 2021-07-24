<?php
use Controllers\MedicamentController;

$this->GET('/?',function($req,$res,$service,$app)
{
    MedicamentController::index($req,$res,$service,$app);
});
$this->POST('/?',function($req,$res,$service,$app)
{
    MedicamentController::insert($req,$res,$service,$app);
});
$this->POST('/[i:id]',function($req,$res,$service,$app)
{
    MedicamentController::update($req,$res,$service,$app);
});
$this->DELETE('/[i:id]',function($req,$res,$service,$app)
{
    MedicamentController::delete($req,$res,$service,$app);
});
$this->GET('/creer',function($req,$res,$service,$app)
{
    MedicamentController::create($req,$res,$service,$app);
});
$this->GET('/modifier/[i:id]',function($req,$res,$service,$app)
{
    MedicamentController::edit($req,$res,$service,$app);
});