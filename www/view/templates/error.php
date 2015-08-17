<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Portal</title>
    <link rel="stylesheet" href="../../additions/bootstrap.min.css">
    <script src="../../additions/jquery-1.11.3.min.js"></script>
    <script src="../../additions/bootstrap.min.js"></script>
</head>
<body>
<?php
include __DIR__ . "/nav.php";
?>

<div class="container">

    <div class="row text-center">
        <?php if(isset($error)):?>
            <h1><?php echo $error->getCode()?></h1>
        <?php endif;?>
        <?php if(isset($error)):?>
            <div><?php echo $error->getMessage()?></div>
        <?php endif;?>
    </div>

</div>

</body>
</html>