<?php

namespace App\Controller;

use App\Repository\StatisticRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class StatisticController
{
    public function index()
    {
        $statisticRepository = new StatisticRepository();

        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $statisticRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $highscore = htmlentities($_POST['highscore']);
            $playtime = htmlentities($_POST['playtime']) ;
            $user_id = htmlentities($_POST['user_id']) ;
            $game_id = htmlentities($_POST['game_id']) ;

            $statisticRepository = new StatisticRepository();
            $statisticRepository->create($highscore, $playtime, $user_id, $game_id);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}