<?php

use Controllers\LoginController;
$this->GET('/?',function($request,$response,$service,$app){
    LoginController::getHome($request,$response,$service,$app);
});
$this->GET('/login',function($request,$response,$service,$app){
    LoginController::getlogin($request,$response,$service,$app);
});
$this->GET('/logout',function($request,$response,$service,$app){
    LoginController::logout($request,$response,$service,$app);
});
$this->POST('/login',function($request,$response,$service,$app){
    LoginController::login($request,$response,$service,$app);
});
$this->GET('/dashboard',function($request,$response,$service,$app){
    LoginController::getDashboard($request,$response,$service,$app);
});