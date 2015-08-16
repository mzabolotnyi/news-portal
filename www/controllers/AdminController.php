<?php

class AdminController
{
    function actionAddArticle()
    {
        if (!empty($_POST['title'])) {
            $article = new NewsArticle();
            $article->title = $_POST['title'];
            $article->author = $_POST['author'];
            $article->content = $_POST['content'];

            if ($article->save()) {
                header('Location: /');
                die;
            }
        }

        include __DIR__ . "/../view/templates/new_article.php";
    }
}