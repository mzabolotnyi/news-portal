<?php

session_start();

require __DIR__ . '/autoload.php';

$controllerName = empty($_GET['ctrl']) ? 'NewsController' : $_GET['ctrl'].'Controller';
$actionName = empty($_GET['act']) ? 'actionAll' : 'action' . $_GET['act'];

$controller = new $controllerName;

try{
    $controller->$actionName();
}catch (Exception $e){
    $e->showException();
}