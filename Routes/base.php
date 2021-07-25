<?php

use Controllers\LoginController;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$this->GET('/?',function($request,$response,$service,$app){
    LoginController::getHome($request,$response,$service,$app);
});
$this->GET('/login',function($request,$response,$service,$app){
    if(isset($_SESSION['currentUser'])) $service->back();
    LoginController::getlogin($request,$response,$service,$app);
});
$this->GET('/logout',function($request,$response,$service,$app){
    LoginController::logout($request,$response,$service,$app);
});
$this->POST('/login',function($request,$response,$service,$app){
    if(isset($_SESSION['currentUser'])) $service->back();
    LoginController::login($request,$response,$service,$app);
});