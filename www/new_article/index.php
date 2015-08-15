<?php

require __DIR__ . "/../models/articles.php";

if (!empty($_POST['title'])) {
    $article = new NewsArticle();
    $article->title = $_POST['title'];
    $article->author = $_POST['author'];
    $article->content = $_POST['content'];

    if ($article->add()) {
        header('Location: /');
        die;
    }
}

include __DIR__ . "/../view/new_article.php";

