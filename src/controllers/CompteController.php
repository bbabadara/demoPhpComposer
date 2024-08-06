<?php
namespace Bank\Controllers;

use Bank\Models\ClientModel;
use Bank\Models\CompteModel;
use Bank\Models\TypeCompteModel;

class CompteController
{
    private ClientModel $clientModel;
    private CompteModel $compteModel;
    private TypeCompteModel $typeCompteModel;
    public function __construct()
    {
        $this->compteModel = new CompteModel;
        $this->clientModel = new ClientModel;
        $this->typeCompteModel=new TypeCompteModel;
    }
    public function index()
    {
        $typesCompte=$this->typeCompteModel->findAll();
        $disabledClient = "";
        $errors = [];
        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
            if ($action  == "findclient") {
                if (self::estVide(trim($_GET["tel1"]))) {
                    $errors["tel1"] = "Veuillez saisir un numéro de téléphone";
                } else {
                    $client = $this->clientModel->findByTelephone(trim($_GET["tel1"]));
                    if ($client != null) {
                        $disabledClient = "disabled";
                        $_SESSION["client"]=json_decode(json_encode($client), true);
                        // header("location:".WEBROOT."?controller=compte&action=findclient&tel1=".$_GET["tel1"]);
                        // exit;
                    } else {
                        $errors["tel1"] = "Aucun client n'a ce numéro de téléphone, Veillez l'ajouter";
                    }
                }
            } elseif ($action  == "findcompte") {
                if (self::estVide(trim($_GET["tel"]))) {
                    $errors["tel"] = "Veuillez saisir un numéro de téléphone";
                } else {
                    $comptes = $this->compteModel->findByTelephone($_GET["tel"]);
                }
            } elseif ($action  == "addcompte") {
                var_dump($_POST);
                die;
                $_SESSION["post"]=$_POST;
                if ($_POST["idcl"] == 0) {
                    $errors = [];
                    self::isValid($_POST["nom1"], "nom1", $errors);
                    self::isValid($_POST["prenom1"], "prenom1", $errors);
                    self::isValid($_POST["telephone"], "telephone", $errors);
                    self::isValid($_POST["solde"], "solde", $errors);
                    self::isValid($_POST["numero"], "numero", $errors);
                    if (empty($errors)) {
                        $verifNumberCompte = $this->compteModel->findBynumero($_POST["numero"]);
                        if (!$verifNumberCompte) {
                            if (is_numeric($_POST["solde"])) {
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
                                header("location:" . WEBROOT . "?tel=" . $newClient['telephone'] . "&action=findcompte");
                                exit();
                            } else {
                                $errors["solde"] = "le solde doit etre un nombre";
                            }
                        } else {
                            $errors["numero"] = "le numero existe deja";
                        }
                    }
                } else {
                   
                    $disabledClient = "disabled";
                    $help = $_POST["help"];
                    
                    self::isValid($_POST["solde"], "solde", $errors);
                    self::isValid($_POST["numero"], "numero", $errors);
                    if (empty($errors)) {
                        $verifNumberCompte = $this->compteModel->findBynumero($_POST["numero"]);
                        if (!$verifNumberCompte) {
                            if (is_numeric($_POST["solde"])) {
                                self::unsetKey($_POST, ["help", "action", "prenom1", "nom1", "telephone", "controller"]);
                                $this->compteModel->addCompte($_POST);
                                header("location:" . WEBROOT ."?tel=".$help."&controller=compte&action=findcompte");
                                exit();
                            } else {
                                $errors["solde"] = "le solde doit etre un nombre";
                                header("location:" . WEBROOT . "?tel1=".$help."controller=compte&action=findclient&show=notValid");
                                exit();
                            }
                        } else {
                            $errors["numero"] = "le numero existe deja";
                            header("location:" . WEBROOT . "?tel1=".$help. "controller=compte&action=findclient&show=notValid");
                            exit();
                        }
                    }else {
                        header("location:" . WEBROOT . "?tel1=".$help. "controller=compte&show=notValid");
                        exit();
                    }
                }
            }
        }
        // var_dump( $_SESSION["post"]);
        // die;
        require_once ROOT . "/views/comptes/index.html.php";
    }

    public function unsetKey(array &$tab, array $keys): void
    {
        foreach ($keys as $key) {
            unset($tab[$key]);
        }
    }

    public function isValid($champ, $nomChamp, &$tabErrors, $msg = "champs obligatoire")
    {
        if (self::estVide($champ)) {
            $tabErrors[$nomChamp] = $msg;
        }
    }
    public function estVide($val): bool
    {
        return empty($val);
    }
}
