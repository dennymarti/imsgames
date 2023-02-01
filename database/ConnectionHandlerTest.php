<?php

include_once 'ConnectionHandler.php';

$connectionHandler = new ConnectionHandler();
$connectionHandler->connect('localhost', 'root', 'imsgames', 'Sml12345*');

if ($connectionHandler->isConnected()) {
    echo 'Datenbankverbindung erfolgreich aufgebaut.';
}