<?php


class E403Ecxeption
    extends Exception
{

    public $origin;

    public function showException()
    {
        header("HTTP/1.0 403 Data Base Error");
        $view = new View();
        $view->error = $this;
        $view->display(__DIR__ . '/../view/templates/error.php');

        $log = new Log();
        $log->addRecord($this->getCode() . ' ' . $this->getMessage() . ' (' . $this->origin . ')');
    }

}