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
    <?php if(isset($this->error)):?>
        <div class="text-center" style="color: red;"><?php echo $this->error?></div>
    <?php endif;?>
    <div class="text-center">
        <form action="/index.php?ctrl=Admin&act=Open" method="post" name="adminAuth">
            <div class="form-group">
                <input type="text" name="login" placeholder="login" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">Enter</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
