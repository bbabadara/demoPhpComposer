<?php
namespace Bank\Controllers;
use Bank\Models\ClientModel;
use Bank\Models\CompteModel;
class CompteController{
    private ClientModel $clientModel;
    private CompteModel $compteModel;

    public function index(){
        require_once ROOT."/views/comptes/index.html.php";
    }
}

