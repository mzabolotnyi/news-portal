<?php

require __DIR__ . "/../models/articles.php";

if (!empty($_POST['title'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    if(articlesAdd($title, $author, $content)){
        header('Location: /');
        die;
    }
}

include __DIR__ . "/../view/new_article.php";

