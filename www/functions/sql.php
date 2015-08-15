<?php

class Sql
{

    static public function sqlConnect()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('news');
    }

    static public function sqlSelect($query)
    {
        Sql::sqlConnect();
        $res = mysql_query($query);
        $ret = [];

        while ($row = mysql_fetch_assoc($res)) {
            $ret[] = $row;
        }

        return $ret;
    }

    static public function sqlExecute($query)
    {
        Sql::sqlConnect();
        $res = mysql_query($query);

        return $res != false;
    }
}