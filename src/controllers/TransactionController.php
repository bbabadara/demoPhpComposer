<?php

namespace Bank\Controllers;

use Bank\Models\CompteModel;
use Bank\Models\TransactionModel;

class TransactionController
{
    private TransactionModel $transactionModel;
    private CompteModel $compteModel;
    public function __construct()
    {
        $this->compteModel = new CompteModel;
        $this->transactionModel = new TransactionModel;
    }

    public function load()
    {
        $compte = $this->compteModel->findByID($_REQUEST["key"]);
        $transactions = $this->transactionModel->findByComptesId($_REQUEST["key"]);

        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "filter") {
                $type = $_GET["type"];
                $transactions = $this->transactionModel->findByComptesId($_GET["key"], $type);
            } elseif ($_REQUEST['action'] == "addTransaction") {
                self::unsetKey($_POST, ["action", "controller"]);
                $_POST["datet"] = date("Y-m-d");
                $up = [
                    "montant" => $_POST["montant"],
                    "idc" => $_POST["idc"]
                ];
                $this->transactionModel->addTransaction($_POST, $up);
            }
        }
        require_once ROOT . "/views/transactions/transaction.html.php";
    }

    // to model
    public function unsetKey(array &$tab, array $keys): void
    {
        foreach ($keys as $key) {
            unset($tab[$key]);
        }
    }
}
