<?php


class DB
{

    public function PDO()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '123';
        $dbname = 'whoisbot';
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
