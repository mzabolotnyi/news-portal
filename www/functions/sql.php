<?php

function sql_connect()
{
    mysql_connect('localhost', 'root', '');
    mysql_select_db('news');
}

function sql_select($query)
{
    sql_connect();
    $res = mysql_query($query);
    $ret = [];

    while ($row = mysql_fetch_row($res)) {
        $ret[] = $row;
    }

    return $ret;
}

function sql_execute($query)
{
    sql_connect();
    $res = mysql_query($query);

    return $res != false;
}