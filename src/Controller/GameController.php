<?php

namespace App\Controller;

use App\Repository\GameRepository;
use App\Repository\CommentRepository;
use App\Repository\UserRepository;
use App\Service\NotificationService;
use App\View\View;
use App\Service\AuthenticationService;

/**
 * Siehe Dokumentation im DefaultController.
 */
class GameController
{
    public function index()
    {
        $view = new View('game/index');
        $view->title = 'Games';
        $gameRepository = new GameRepository();
        $view->heading = 'Games';
        $view->games = $gameRepository->readAll();
        $view->isLoggedIn = AuthenticationService::isAuthenticated();
        // to display all games
        $view->display();
    }

    // view to allow user sending us a request of their game
    public function request() {
        $view = new View('game/request');
        $view->title = 'Request';
        $view->heading = 'Request';
        $view->isLoggedIn = AuthenticationService::isAuthenticated();
        $view->display();
    }

    public function selected() {
        $view = new View('game/selected');
        $view->isLoggedIn = AuthenticationService::isAuthenticated();
        // to get game with url id
        $gameRepository = new GameRepository();
        $commentRepository = new CommentRepository();
        $userRepository = new UserRepository();
        $view->users =$userRepository->readAll();
        $view->comments = $commentRepository->readAllCommentsById($_GET['id']);
        $game = $gameRepository->readById($_GET['id']);

        $view->game = $game;
        $view->title = $game->name;
        $view->heading = $game->name;

        $view->display();
    }
}
