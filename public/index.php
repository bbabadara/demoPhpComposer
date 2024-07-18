<?php
define("ROOT", "C:/Users/bbaba/Documents/0000ProjetComposer/demoPhp");
require_once ROOT."/vendor/autoload.php";
use Bank\Controllers\CompteController;
$controller= new CompteController();
$controller->index();
