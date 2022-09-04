<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;


class RequestRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'request';

    public function create($email, $link, $textarea)
    {
        $email = ConnectionHandler::escape($email);
        $link = ConnectionHandler::escape($link);
        $textarea = ConnectionHandler::escape($textarea);

        $query = "INSERT INTO $this->tableName (email, link, textarea) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $email, $link, $textarea);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
}