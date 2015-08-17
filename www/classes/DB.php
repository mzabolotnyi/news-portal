<?php

class DB
{

    private $dbh;
    private $className;

    public function __construct($className = 'stdClass')
    {
        try {
            $this->dbh = new PDO('mysql:dbname=news;host=localhost', 'root', '');
            $this->className = $className;
        } catch (PDOException $e) {
            throw new E403Ecxeption('Forbidden', 403);
        }
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if ($res == false) {
            $e = E403Ecxeption('Forbidden', 403);
            $e->origin = 'DB';
            throw $e;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);

        if ($res == false) {
            $e = E403Ecxeption('Forbidden', 403);
            $e->origin = 'DB';
            throw $e;
        }

        return $res;
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}