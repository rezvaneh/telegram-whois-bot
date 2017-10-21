<?php


class DB
{

    public function PDO()
    {
        $servername = 'SERVER_NAME';
        $username = 'USERNAME';
        $password = 'PASSWORD';
        $dbname = 'DATABASE_NAME';
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
