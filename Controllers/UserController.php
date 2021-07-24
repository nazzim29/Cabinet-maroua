<?php
namespace Controllers;
use Views\View;
class UserController
{
    static function get($req,$res)
    {
        View::display('hello');
    }
}

