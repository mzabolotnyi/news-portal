<?php

require __DIR__ . "/../models/articles.php";

$articles = NewsArticle::getAll();

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
            <?php
            foreach ($articles as $article):
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <a href="/view/article.php<?php echo '?id=' . $article->getId() ?>">
                            <?php $article->showPreview() ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

</body>
</html>