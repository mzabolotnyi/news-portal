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

        if ($item == false) {
            $e = new E404Ecxeption('News with id ' . $_GET['id'] . ' not found', 404);
            $e->origin = 'NewsController';
            throw $e;
        }

        $view = new View();
        $view->item = $item;
        $view->display(__DIR__ . '/../view/templates/article.php');
    }

}