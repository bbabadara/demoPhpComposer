<?php
namespace Bank\Controllers;
use Bank\Models\ClientModel;
use Bank\Models\CompteModel;
class CompteController{
    private ClientModel $clientModel;
    private CompteModel $compteModel;
    public function __construct(){
        $this->compteModel = new CompteModel;
        $this->clientModel = new ClientModel;
    }
    public function index(){
       

        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"]=="findclient") {
               $client=$this->clientModel->findByTelephone($_GET["tel1"]);
            }
            elseif ($_REQUEST["action"]=="findcompte") {
         $comptes= $this->compteModel->findByTelephone($_GET["tel"]);
           }
            elseif ($_REQUEST["action"]=="addcompte") {
                if (!isset($_POST["key"])) {
                    // $newClient=[
                    //     "nom"=>$_POST["nom1"],
                    //     "prenom"=>$_POST["prenom1"],
                    //     "telephone"=>$_POST["telephone"],
                    // ];
                    // $idcl=$this->clientModel->addClient($newClient);
                    // $newCompte=[
                    //     "numero"=>$_POST["numero"],
                    //     "solde"=>$_POST["solde"],
                    //     "idcl"=>$idcl
                    // ];
                    // $this->compteModel->addCompte($newCompte);
                    $newClient=[
                        "nom"=>$_POST["nom1"],
                        "prenom"=>$_POST["prenom1"],
                        "telephone"=>$_POST["telephone"],
                    ];
                    $newCompte=[
                        "numero"=>$_POST["numero"],
                        "solde"=>$_POST["solde"],
                    ];
                    $this->compteModel->addCompteTransaction($newClient,$newCompte);
                     header("location:http://localhost:8000/?tel=".$newClient['telephone']."&action=findcompte");
                }
                else {
                    $newCompte=[
                        "numero"=>$_POST["numero"],
                        "solde"=>$_POST["solde"],
                        "idcl"=>$_POST["key"]
                    ];
                    $this->compteModel->addCompte($newCompte);
                     header("location:http://localhost:8000/?tel=".$_POST["help"]."&action=findcompte");
           }
        }
     
    }
    require_once ROOT."/views/comptes/index.html.php";
}

}