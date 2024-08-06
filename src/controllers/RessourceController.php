<?php
namespace Bank\Controllers;
use Bank\Models\CompteModel;
class RessourceController
{
    private CompteModel $compteModel;
    public function __construct()
    {
        $this->compteModel = new CompteModel;
    }

    public function load()
    {
        require_once ROOT . "/views/ressources/ressource.html.php";
    }

    // to model
    public function unsetKey(array &$tab, array $keys): void
    {
        foreach ($keys as $key) {
            unset($tab[$key]);
        }
    }
}
