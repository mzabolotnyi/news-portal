<?php

require __DIR__."/../models/articles.php";

if(empty($_GET['id'])){
    header('Location: /');
    die;
}

$article = NewsArticle::getById($_GET['id']);

if ($article == false){
    header('Location: /');
    die;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Portal</title>
    <link rel="stylesheet" href="../additions/bootstrap.min.css">
    <script src="../additions/jquery-1.11.3.min.js"></script>
    <script src="../additions/bootstrap.min.js"></script>
</head>
<body>
<?php
include __DIR__ . "/nav.php";
?>

<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php echo $article->title?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h4><?php echo $article->getDate()?></h4>
                </div>
                <div class="col-md-8">
                    <h4><?php echo $article->author?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php echo $article->content?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>

</body>
</html>

