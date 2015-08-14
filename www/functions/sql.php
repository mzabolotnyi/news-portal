<?php

function sqlConnect()
{
    mysql_connect('localhost', 'root', '');
    mysql_select_db('news');
}

function sqlSelect($query)
{
    sqlConnect();
    $res = mysql_query($query);
    $ret = [];

    while ($row = mysql_fetch_assoc($res)) {
        $ret[] = $row;
    }

    return $ret;
}

function sqlExecute($query)
{
    sqlConnect();
    $res = mysql_query($query);

    return $res != false;
}