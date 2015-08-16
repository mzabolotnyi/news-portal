<?php

class DB
{

    private $dbh;
    private $className;

    public function __construct($className = 'stdClass')
    {
        $this->dbh = new PDO('mysql:dbname=news;host=localhost', 'root', '');
        $this->className = $className;
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        if ($sth->execute($params)){
            return $this->dbh;
        }else{
            return false;
        }
    }

}