<?php
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__.'/Views/View.php';
require_once __DIR__."/Controllers/loginController.php";
require_once __DIR__."/Controllers/patientController.php";
require_once __DIR__."/Controllers/prescriController.php";
require_once __DIR__."/Controllers/rdvController.php";
require_once __DIR__."/Controllers/UserController.php";
require_once __DIR__."/Controllers/MedicamentsController.php";
require_once __DIR__."/Models/Model.php";
require_once __DIR__."/Models/Users.php";
require_once __DIR__."/Models/Patient.php";
require_once __DIR__."/Models/Rdv.php";
require_once __DIR__."/Models/Medicament.php";
require_once __DIR__."/Models/Prescri.php";
require_once __DIR__."/libs/Mail.php";
session_start();
$klein = new \Klein\Klein();

$klein->with("","Routes/index.php");
$klein->dispatch();