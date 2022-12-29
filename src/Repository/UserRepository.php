<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $username Wert für die Spalte username
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($username, $password)
    {
        $usernames = $this->readAll();
        foreach ($usernames as $name) {
            if ($name->username == $username) {
                $registrationMessage = 'Der Benutzername ist bereits vergeben.';
                return [false, $registrationMessage];
            }
        }

        $password = hash('sha256', $password);

        $query = "INSERT INTO $this->tableName (username, password) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $registrationMessage = 'Dein Konto wurde erfolgreich registriert.';

        return [true, $registrationMessage];
    }

    public function readByName($username)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE username=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);

        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        $row = $result->fetch_object();

        $result->close();

        return $row;
    }
}
