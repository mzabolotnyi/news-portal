<?php

require __DIR__ . '/../functions/sql.php';

abstract class Article
{
    protected $id;

    public $title;
    public $content;

    abstract function articlesAdd();
}

class NewsArticle
{
    protected $date;

    public $author;

    static public function getAll()
    {
        $query = "SELECT * FROM articles ORDER BY date DESC";
        $res = Sql::sqlSelect($query);
        $ret = [];

        foreach ($res as $elem) {
            $art = new NewsArticle();
            $art->title = $elem['title'];
            $art->content = $elem['content'];
            $art->id = $elem['id'];
            $art->date = $elem['date'];
            $art->author = $elem['author'];

            $ret[] = $art;
        }

        return $ret;
    }

    static public function getById($id)
    {
        $query = "SELECT * FROM articles WHERE id = '" . $id . "'";
        $arr = Sql::sqlSelect($query);
        if (count($arr) > 0) {
            $art = new NewsArticle();
            $art->title = $arr[0]['title'];
            $art->content = $arr[0]['content'];
            $art->id = $arr[0]['id'];
            $art->date = $arr[0]['date'];
            $art->author = $arr[0]['author'];
            return $art;
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
            return Sql::sqlExecute($query);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate(){
        return $this->date;
    }

    public function showPreview(){
        echo $this->getDate() . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $this->title;
    }
}

