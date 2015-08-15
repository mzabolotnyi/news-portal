<?php

class BD
{

    public static function sqlConnect()
    {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('news');
    }

    public static function sqlSelect($query, $class = 'stdClass')
    {
        BD::sqlConnect();
        $res = mysql_query($query);
        $ret = [];

        while ($row = mysql_fetch_object($res, $class)) {
            $ret[] = $row;
        }

        return $ret;
    }

    public static function sqlExecute($query)
    {
        BD::sqlConnect();
        $res = mysql_query($query);

        return $res != false;
    }
}