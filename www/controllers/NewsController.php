<?php

class NewsController
{
    public function actionAll(){
        $items = NewsArticle::getAll();

        $view = new View();
        $view->setData('items',$items);
        $view->display(__DIR__ . '/../view/articleAll.php');
    }

    public function actionOne(){
        $item = NewsArticle::getById($_GET['id']);

        $view = new View();
        $view->setData('item',$item);
        $view->display(__DIR__.'/../view/article.php');
    }

    public function actionAdd(){
        $view = new View();
        $view->display(__DIR__.'/../view/new_article.php');
    }
}