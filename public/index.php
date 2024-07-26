<?php
define("ROOT", "C:/Users/bbaba/Documents/0000ProjetComposer/demoPhp");
define("WEBROOT","http://localhost:8000/");
require_once ROOT."/vendor/autoload.php";
session_start();
use Bank\Controllers\TransactionController;
use Bank\Controllers\CompteController;
if (isset($_REQUEST["controller"])) {
    if ($_REQUEST["controller"]=='compte') {
        $controller= new CompteController();
        $controller->index();
    }elseif($_REQUEST["controller"]=='transaction') {
        $controller= new TransactionController();
         $controller->load();
    }
} else {
    $controller= new CompteController();
    $controller->index();
}


