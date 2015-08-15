<?php

class NewsArticle
{
    protected $date;
    protected $id;

    public $title;
    public $content;
    public $author;

    public static function getAll()
    {
        $query = "SELECT * FROM articles ORDER BY date DESC";

        return BD::sqlSelect($query, 'NewsArticle');
    }

    public static function getById($id)
    {
        $query = "SELECT * FROM articles WHERE id = '" . $id . "'";
        $arr = BD::sqlSelect($query, 'NewsArticle');
        if (count($arr) > 0) {
            return $arr[0];
        } else {
            return false;
        }
    }

    public function add()
    {
        {
            if ($this->title == '') {
                return false;
            }

            $query = "INSERT INTO articles (title, author, content) VALUES ('" . $this->title . "', '" . $this->author . "', '" . $this->content . "')";
            return BD::sqlExecute($query);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function showPreview()
    {
        echo $this->title . '&nbsp&nbsp&nbsp(' . $this->author . ')';
    }
}

