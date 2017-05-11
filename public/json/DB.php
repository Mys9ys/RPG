<?php

$HOST = 'mir.beget.com';//имя сервера
$USER = 'rjbexaj9_games';
$PASS = '32tameda';
$DB = 'rjbexaj9_games';//база данных
class DB
{

    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=rjbexaj9_games;host=mir.beget.com','rjbexaj9_games', '32tameda');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }
    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function dbTableList()
    {
        $sql = "SHOW TABLES ";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchall(PDO::FETCH_COLUMN);
    }
}