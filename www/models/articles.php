<?php

require __DIR__ . '/../functions/sql.php';

function articlesGetAll()
{
    $query = "SELECT * FROM articles ORDER BY date DESC";
    return sqlSelect($query);
}

function articlesGetById($id)
{
    $query = "SELECT * FROM articles WHERE id = '" . $id . "'";
    $arr = sqlSelect($query);
    if (count($arr) > 0) {
        return $arr[0];
    } else {
        return false;
    }
}

function articlesAdd($title, $author, $content)
{
    if ($title == '') {
        return false;
    }

    $query = "INSERT INTO articles (title, author, content) VALUES ('" . $title . "', '" . $author . "', '" . $content . "')";
    return sqlExecute($query);
}