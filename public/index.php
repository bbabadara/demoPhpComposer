<?php
define("ROOT", "C:/Users/bbaba/Documents/0000ProjetComposer/demoPhp");
define("WEBROOT","http://localhost:8000/");
require_once  ROOT."/vendor/autoload.php"; 
session_start();
use Bank\Controllers\RessourceController;
use Bank\Controllers\TransactionController;
use Bank\Controllers\CompteController;

if (isset($_REQUEST["controller"])) {
    $recup=$_REQUEST["controller"];
    if ($recup=='compte') {
        $controller= new CompteController();
        $controller->index();
    }elseif($recup=='transaction') {
        $controller= new TransactionController();
         $controller->load();
    }elseif($recup=='ressource') {
        $controller= new RessourceController();
         $controller->load();
    }
} else {
    $controller= new CompteController();
    $controller->index();
}


