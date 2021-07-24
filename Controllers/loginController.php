<?php

namespace Controllers;
    use Views\View;
    use Models\Users;
    use Models\Patient;

    class LoginController{

        static function getlogin($req, $res, $service)
        {
            return View::display('login', array(
                'error' => $service->flashes('error'),
            ));
        }
        static function getHome($req, $res, $service)
        {
            echo 'merci';
        }

        static function login($req, $res, $service, $app)
        {
            $service->validateParam('email', 'please enter a valid email')->notNull()->isEmail();
            $service->validateParam('password')->notNull()->isLen(3, 32);
            $user = new Users();
            $user->adresse_mail = $req->paramsPost()->get("email");
            if ($user->selectbyEmail()) {
                if ($user->verifyPass($req->paramsPost()->get('password'))) {
                    $service->startSession();
                    if ($user->role == 'patient') {
                        $patient = Patient::fromUser($user);
                        $patient->read();
                        $_SESSION['currentUser'] = $patient;
                        $res->redirect('\rendez-vous');

                    } else {
                        $_SESSION['currentUser'] = $user;
                        $res->redirect('/patient');
                    }
                } else {
                    $service->flash('mot de passe incorrecte', 'error');
                    $service->back();
                }
            } else {
                $service->flash('utilisateur introuvable', 'error');
                $service->back();
            }
        }
        static function getDashboard($req, $res)
        {
            if ($_SESSION['currentUser']) return View::display('dashboard');
            return $res->redirect('/login');
        }
        static function logout($req, $res)
        {
            $_SESSION = array();
            $res->redirect('/login');
        }
    }
