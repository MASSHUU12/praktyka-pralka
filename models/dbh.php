<?php

class Dbh {

    private $servername = "serwer2069921.home.pl";
    private $username = "32046516_database1";
    private $password = "FlEyenZY1!";
    private $dbname = "32046516_database1";

    protected function connect() {
        $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

}