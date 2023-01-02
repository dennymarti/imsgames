<?php

namespace App\Controller;

use App\Database\ConnectionHandler;
use App\Repository\RequestRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class RequestController
{
    private function index($message, $email, $link, $description) {
        $view = new View('game/request');
        $view->title = "Request | imsgames";
        $view->heading = 'Request';
        if (isset($message)) {
            $view->error = $message;
        }
        if (isset($email)) {
            $view->email = $email;
        }
        if (isset($link)) {
            $view->link = $link;
        }
        if (isset($description)) {
            $view->description = $description;
        }
        $view->display();
    }

    public function create()
    {
        if (isset($_POST['send'])) {
            $email = ConnectionHandler::escape(strtolower($_POST['email']));
            $link = ConnectionHandler::escape(strtolower($_POST['link']));
            $description = ConnectionHandler::escape($_POST['description']);

            if ($this->isEmailValid($email)) {
                if ($this->isGithubRepositoryValid($link)) {
                    if ($this->isDescriptionValid($description)) {
                        session_start();

                        $_SESSION['system'] = 'Dein Request wurde erfolgreich gespeichert.';
                        header('Location: /game');
                        exit();
                    } else {
                        $this->index('Beschreibung ist ungültig.', $email, $link, $description);
                    }
                } else {
                    $this->index('Github Respository Link ist ungültig.', $email, $link, $description);
                }
            } else {
                $this->index('E-Mail Adresse ist ungültig.', $email, $link, $description);
            }
            exit();
        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
    }

    private function isEmailValid($email) {
        $regex = '/^[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,4}$/';

        if (preg_match($regex, $email)) {
            return true;
        }
        return false;
    }

    private function isDescriptionValid($description) {
        $regex = '/^[a-zA-Z0-9äöüÄÖÜ\s]+$/';

        if (preg_match($regex, $description)) {
            return true;
        }
        return false;
    }

    private function isGithubRepositoryValid($link) {
        $regex = '/^((git|ssh|http(s)?)|(git@[\w\.]+))(:(\/\/)?)([\w\.@\:\/\-~]+)(\.git)(\/)?$/';

        if (preg_match_all($regex, $link)) {
            return true;
        }
        return false;
    }

    public function delete()
    {
        $requestRepository = new RequestRepository();
        $requestRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /request');
    }
}
