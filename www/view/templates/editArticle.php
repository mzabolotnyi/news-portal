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

<div class="container text-center">

    <div class="text-center">
        <form action="/index.php?ctrl=admin&act=editnews&id=<?php echo $item->id?>" method="post" name="form_news">
            <div class="form-group">
                <input type="text" name="title" placeholder="title" style="width: 600px;" required value="<?php echo $item->title?>">
            </div>
            <div class="form-group">
                <input type="text" name="author" placeholder="author" required value="<?php echo $item->author?>">
            </div>
            <div class="form-group">
                <textarea name="content" cols="100" rows="17" required><?php echo $item->content?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">Save</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
