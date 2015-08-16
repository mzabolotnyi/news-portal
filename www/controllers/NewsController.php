<?php

class NewsController
{
    public function actionAll()
    {
        $items = NewsArticle::select('date DESC');

        $view = new View();
        $view->items = $items;
        $view->display(__DIR__ . '/../view/templates/articleAll.php');
    }

    public function actionOne()
    {
        $item = NewsArticle::selectById($_GET['id']);

        $view = new View();
        $view->item = $item;
        $view->display(__DIR__ . '/../view/templates/article.php');
    }

    public function actionAdd()
    {
        $view = new View();
        $view->display(__DIR__ . '/../view/templates/new_article.php');
    }
}