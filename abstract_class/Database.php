<?php

abstract class Database
{
    public string $connection;
    public bool $connectionActive;
    public function __construct($connection, $connectionActive)
    {
        $this->connection = $connection;
        $this->connectionActive = $connectionActive;
    }

    public abstract function setConnection(bool $connection_status);
    public abstract function getConnection();
}

class DBconnection extends Database
{
    public function __construct($connection, $connectionActive)
    {
        parent::__construct($connection, $connectionActive);
    }

    public function getConnection(): void
    {
        if ($this->connectionActive) {
            echo "Connection Active" . PHP_EOL;
        } else {
            echo "Disconnected" . PHP_EOL;
        }
    }

    public function setConnection(bool $connection_status)
    {
        $this->connectionActive = $connection_status;

        return $this; // return form method chaining
    }
}


$dbConnection = new DBconnection("What is the Status", true);
$dbConnection->setConnection(false)->getConnection(); // Here method changing Used
