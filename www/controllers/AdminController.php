<?php

class AdminController
{

    function actionCheck()
    {
        if (isset($_SESSION['admin'])) {
            header('Location: http://news-portal/index.php?ctrl=admin&act=open');
        } else {
            $view = new View();
            $view->display(__DIR__ . '/../view/templates/adminAuth.php');
        }
    }

    function actionOpen()
    {
        $view = new View();

        if (!isset($_SESSION['admin'])) {
            if ((empty($_POST['login']) || empty($_POST['password'])) || ($_POST['login'] != 'admin' || $_POST['password'] != '123')) {
                $view->error = 'Failed!';
                $view->display(__DIR__ . '/../view/templates/adminAuth.php');
                die;
            }else{
                $_SESSION['admin'] = $_POST['login'];
            }
        }

        $items = NewsArticle::select('date DESC');

        $view->items = $items;
        $view->display(__DIR__ . '/../view/templates/adminPanel.php');
    }

    function actionLog()
    {
        $view = new View();
        $view->display(__DIR__ . "/../view/templates/log.php");
    }

    function actionDeleteNews()
    {
        if (!empty($_GET['id'])) {
            $item = NewsArticle::selectById($_GET['id']);

            if ($item == false) {
                $e = new E404Ecxeption('News with id ' . $_GET['id'] . ' not found', 404);
                $e->origin = 'AdminController';
                throw $e;
            }

            $item->delete();
        }

        header('Location: http://news-portal/index.php?ctrl=admin&act=open');
    }

    function actionAddNewsInit()
    {
        $view = new View();
        $view->display(__DIR__ . "/../view/templates/newArticle.php");
    }

    function actionAddNews()
    {
        if (!empty($_POST['title'])) {
            $article = new NewsArticle();
            $article->title = $_POST['title'];
            $article->author = $_POST['author'];
            $article->content = $_POST['content'];

            if ($article->save()) {
                header('Location: http://news-portal/index.php?ctrl=admin&act=open');
                die;
            }
        }

        $this->actionAddNewsInit();
    }

    function actionEditNewsInit()
    {
        if (!empty($_GET['id'])) {
            $item = NewsArticle::selectById($_GET['id']);

            if ($item == false) {
                $e = new E404Ecxeption('News with id ' . $_GET['id'] . ' not found', 404);
                $e->origin = 'AdminController';
                throw $e;
            }

            $view = new View();
            $view->item = $item;
            $view->display(__DIR__ . "/../view/templates/editArticle.php");
            die;
        }

        $this->actionOpen();
    }

    function actionEditNews()
    {
        if (!empty($_POST['title'])) {
            $item = NewsArticle::selectById($_GET['id']);

            if ($item == false) {
                $e = new E404Ecxeption('News with id ' . $_GET['id'] . ' not found', 404);
                $e->origin = 'AdminController';
                throw $e;
            }

            $item->title = $_POST['title'];
            $item->author = $_POST['author'];
            $item->content = $_POST['content'];

            if ($item->save()) {
                header('Location: http://news-portal/index.php?ctrl=admin&act=open');
                die;
            }
        }

        $this->actionEditNewsInit();
    }
}