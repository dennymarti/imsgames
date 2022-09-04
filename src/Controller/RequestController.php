<?php

namespace App\Controller;

use App\Repository\RequestRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class RequestController
{
    private function index() {
        $view = new View('request/index');
        $view->title = "Request";
        $view->display();
    }

    public function create()
    {
        if (isset($_POST['send'])) {
            $email = htmlentities($_POST['email']);
            $link = htmlentities($_POST['link']);
            $textarea = htmlentities($_POST['textarea']);

            $requestRepository = new RequestRepository();
            $requestRepository->create($email, $link, $textarea);

            $this->index();
        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
    }

    public function delete()
    {
        $requestRepository = new RequestRepository();
        $requestRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /request');
    }
}
