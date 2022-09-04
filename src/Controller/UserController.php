<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\NotificationService;
use App\View\View;
use App\Service\AuthenticationService;


/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        if (AuthenticationService::isAuthenticated()){
            $userRepository = new UserRepository();

            $view = new View('user/index');

            $view->isLoggedIn = isset($_SESSION['id']);

            $view->title = 'Benutzer';
            $view->heading = 'Benutzer';
            $view->users = $userRepository->readById($_SESSION['id']);
            $view->display();
        }
        else{
            header('Location: /signin');
        }
    }
    
    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Registrieren';
        $view->heading = 'Registrieren';
        $view->display();
    }

    public function signup(){
        $view = new View('user/create');

        $view->title = 'Registrieren';
        $view->heading = 'Registrieren';
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']) ;

            $userRepository = new UserRepository();

            $result = $userRepository->create($username, $password);
            if ($result[0]) {
                AuthenticationService::login($username, $password);
                NotificationService::setNotification("Erfolgreich registriert.");
                header('Location: /game');
            } else {
                $view = new View('user/create');

                $view->title = 'Registrieren';
                $view->heading = 'Registrieren';
                $view->error = $result[1];
                $view->display();
            }
        }
    }


    public function delete()
    {
        AuthenticationService::restrictAuthenticated();

        $userRepository = new UserRepository();
        $userRepository->deleteById(htmlentities($_GET['id']));

        AuthenticationService::logout();

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /default');
    }
}
