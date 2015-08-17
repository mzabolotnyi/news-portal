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

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Date</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td><a href="../../index.php?ctrl=admin&act=addnews">+ Add</a></td>
                </tr>
                </thead>
                <tbody class="table-hover">
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item->id?></td>
                        <td><?php echo $item->date?></td>
                        <td><a href="../../index.php?ctrl=news&act=one&id=<?php echo $item->id?>"><?php echo $item->title?></a></td>
                        <td><?php echo $item->author?></td>
                        <td>
                            <a href="../../index.php?ctrl=admin&act=editnews&id=<?php echo $item->id?>">Edit</a>
                            &nbsp
                            <a href="../../index.php?ctrl=admin&act=deletenews&id=<?php echo $item->id?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"><a href="../../index.php?ctrl=admin&act=log">Show log</a></div>
    </div>
</div>

</body>
</html>