<?php
use Controllers\UserController;
$this->respond('GET', '/?',function($request,$response,$service,$app){
    UserController::get($request,$response,$service,$app);
});