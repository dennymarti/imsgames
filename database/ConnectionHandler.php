<?php

class ConnectionHandler
{

    private static $connection;

    public function getConnection() {
        return self::$connection;
    }

    public function isConnected()
    {
        return self::$connection;
    }

    public function connect($host, $username, $database, $password) {
        if (!$this->isConnected()) {
            try {
                self::$connection = mysqli_connect($host, $username, $password, $database);
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        }
    }

    public function disconnect() {
        if ($this->isConnected()) {
            try {
                mysqli_close(self::$connection);
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        }
    }

    public function executeQuery($sql) {
        if ($this->isConnected()) {
            try {
                mysqli_query(self::$connection, $sql);
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        } else {
            echo 'Could not execute query due no database connection.';
        }
    }

    public function getResult($sql) {
        if ($this->isConnected()) {
            try {
                return mysqli_query(self::$connection, $sql);
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        } else {
            echo 'Could not execute query due no database connection.';
        }
        return null;
    }

    public function createTable() {
        $this->executeQuery("");
    }

    public function escapeString($string) {
        if ($this->isConnected()) {
            return mysqli_real_escape_string(self::$connection, $string);
        }
        return $string;
    }
}