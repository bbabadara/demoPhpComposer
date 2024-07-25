<?php

namespace Bank\Controllers;

use Bank\Models\ClientModel;
use Bank\Models\CompteModel;

class CompteController
{
    private ClientModel $clientModel;
    private CompteModel $compteModel;
    public function __construct()
    {
        $this->compteModel = new CompteModel;
        $this->clientModel = new ClientModel;
    }
    public function index()
    {
        $disabledClient = "";

        if (isset($_REQUEST["action"])) {

            if ($_REQUEST["action"] == "findclient") {
                
                $client = $this->clientModel->findByTelephone($_GET["tel1"]);
                if ($client != null) {
                    $disabledClient = "disabled";
                }
            } elseif ($_REQUEST["action"] == "findcompte") {
                $comptes = $this->compteModel->findByTelephone($_GET["tel"]);
            } elseif ($_REQUEST["action"] == "addcompte") {
                if ($_POST["idcl"] == 0) {
                    $newClient = [
                        "nom" => $_POST["nom1"],
                        "prenom" => $_POST["prenom1"],
                        "telephone" => $_POST["telephone"]
                    ];
                    $newCompte = [
                        "numero" => $_POST["numero"],
                        "solde" => $_POST["solde"],
                    ];
                    $this->compteModel->addCompteTransaction($newClient, $newCompte);
                    header("location:" . WEBROOT ."?tel=".$newClient['telephone']."&action=findcompte");
                } else {
                    $help = $_POST["help"];
                    self::unsetKey($_POST, ["help", "action", "prenom1", "nom1", "telephone","controller"]);
                    $this->compteModel->addCompte($_POST);
                    header("location:" . WEBROOT . "?tel=" . $help . "&action=findcompte");
                }
            }
        }
        require_once ROOT . "/views/comptes/index.html.php";
    }

    public function unsetKey(array &$tab, array $keys): void
    {
        foreach ($keys as $key) {
            unset($tab[$key]);
        }
    }
}
