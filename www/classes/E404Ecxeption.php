<?php

class E404Ecxeption
    extends Exception
{

    public $origin;

    public function showException()
    {
        header("HTTP/1.0 404 Not Found");
        $view = new View();
        $view->error = $this;
        $view->display(__DIR__ . '/../view/templates/error.php');

        $log = new Log();
        $log->addRecord($this->getCode() . ' ' . $this->getMessage() . ' (' . $this->origin . ')');
    }
}