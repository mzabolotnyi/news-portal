<?php

/**
 * Class NewsArticle
 * @property $id
 * @property $date
 * @property $title
 * @property $content
 * @property $author
 */
class NewsArticle
    extends Model
{
    protected static $table = 'articles';

    public function getDate()
    {
        return strtotime($this->date);
    }

    public function getDateStr()
    {
        $date = $this->getDate();

        if (date('o', $date) == date('o') && date('m', $date) == date('m') && date('j', $date) == date('j')) {
            return date('H:i', $date);
        } else {
            return date('d F', $date);
        }
    }

    public function showPreview()
    {
        echo $this->title . '&nbsp&nbsp&nbsp(' . $this->author . ')';
    }
}

