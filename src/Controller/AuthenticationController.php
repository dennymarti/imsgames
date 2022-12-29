<?php

namespace App\Controller;

use App\Database\ConnectionHandler;
use App\Service\AuthenticationService;
use App\Service\NotificationService;
use App\View\View;

class AuthenticationController
{

    public function index()
    {
        $view = new View('/authentication/login');
        $view->title = "Login";
        $view->heading = "Login";
        $view->display();
    }

    public function login()
    {
        // to prevent XSS
        $username = strtolower(htmlentities($_POST['username']));
        $password = htmlentities($_POST['password']);

        $loginResult = AuthenticationService::login($username, $password);
        if ($loginResult[0]) {
            NotificationService::setNotification('Du hast dich erfolgreich angemeldet.');
            header('Location: /default');
            exit();
        } else {
            $view = new View('/authentication/login');
            $view->title = 'Login';
            $view->heading = 'Login';
            $view->error = $loginResult[1];
            $view->display();
        }
    }

    public function logout()
    {
        AuthenticationService::logout();
        NotificationService::setNotification("Du hast dich erfolgreich abgemeldet.");

        header('Location: /');
        exit();
    }
}