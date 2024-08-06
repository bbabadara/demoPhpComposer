<?php
$recup = [];
$client = isset($_SESSION["client"]) ? $_SESSION["client"] : [];
// var_dump($client);
unset($_SESSION["client"]);
if (!empty($client)) {
    $recup = [
        "nom1" => $client["nom"],
        "prenom1" => $client["prenom"],
        "tel1" => $client["telephone"],
        "idcl" => $client["idcl"]
    ];
}


if (isset($_REQUEST["show"])) {
    // var_dump($_SESSION["post"]);
    if ($_REQUEST["show"] == "notValid") {
        $recup = $_SESSION["post"];
        unset($_SESSION["post"]);
    }
}
// var_dump($recup);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Comptes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <?= require_once ROOT . "/views/partials/menu.html.php" ?>
                <div class="col py-3">
                    <div class="container d-flex justify-content-center align-items-center ">
                        <h1>Ajout Compte</h1>
                    </div>
                    <div class="container d-flex align-items-md-center justify-content-around mt-2 ">
                        <div class="container col-6">
                            <div class="container shadow p-1  mb-3  rounded">
                                <form method="get">
                                    <div class="d-flex align-items-center p-2">
                                        <label for="inputTel1" class="form-label  mx-3">Telephone</label>
                                        <input type="text" class="form-control <?= isset($errors["tel1"]) ? "is-invalid" : "" ?>" name="tel1" value="<?= $recup["tel1"] ?? '' ?>" id="inputTel1" />
                                        <input type="hidden" name="controller" value="compte">
                                        <button type="submit" class="btn btn-primary mx-3" name="action" value="findclient" id="btnTel1">Ok</button>
                                    </div>
                                    <div class="div-error"><?= $errors["tel1"] ?? '' ?></div>

                                </form>
                                <form action="" method="post">
                                    <div class="card p-2">
                                        <div class="row ">
                                            <div class="form-group col-6  ">
                                                <label for="nom" class="form-label">Nom :</label>
                                                <input type="text" class="form-control " id="nom" name="nom1" value="<?= $recup["nom1"] ?? '' ?> " <?= $disabledClient ?>>
                                                <div class="div-error"> <?= $errors["nom1"] ?? '' ?></div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="prenom" class="form-label">Prénom :</label>
                                                <input type="text" class="form-control " id="prenom" name="prenom1" value="<?= $recup["prenom1"] ?? '' ?> " <?= $disabledClient ?>>
                                                <div class="div-error"><?= $errors["prenom1"] ?? '' ?> </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-1 col-12">
                                            <label for="prenom" class="form-label">Numero de Telphone:</label>
                                            <input type="text" class="form-control " id="telclient" name="telclient" value="<?= $client->telephone ?? '' ?>" <?= $disabledClient ?>>
                                            <div class="div-error"><?= $errors["telclient"] ?? '' ?> </div>
                                        </div>


                                    </div>
                                    <div class="card p-2 mt-1">
                                        <div class="row ">
                                            <div class="form-group col-6">
                                                <label for="inputTel" class="form-label">Type de compte:</label>
                                                <select class="form-select" aria-label="Default select example" name="idtc" id="selectType">
                                                <?php foreach ($typesCompte as $typeCompte) : ?>
                                                    <option value="<?=$typeCompte->idtc?>"><?=$typeCompte->libtc?></option>
                                                    <?php endforeach  ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-6  ">
                                                <label for="nom" class="form-label">Numero :</label>
                                                <input type="text" class="form-control " id="nom" value="<?= $recup["numero"] ?? '' ?>" name="numero">
                                                <div class="div-error"><?= $errors["numero"] ?? '' ?> </div>
                                            </div>

                                        </div>
                                        <div class="form-group col-12 mt-1">
                                            <label for="prenom" class="form-label">Solde :</label>
                                            <input type="text" class="form-control " id="solde" name="solde" value="<?= $recup["solde"] ?? '' ?>">
                                            <div class="div-error"> <?= $errors["solde"] ?? '' ?></div>
                                        </div>

                                    </div>
                                    <input type="hidden" name="idcl" value="<?= $client->idcl ?? '0' ?>">
                                    <input type="hidden" name="telephone" value="<?= $recup["tel1"] ?? '' ?>">
                                    <input type="hidden" name="help" value="<?= $_REQUEST["tel1"] ?? '' ?>">
                                    <input type="hidden" name="controller" value="compte">

                                    <div class="container d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary" name="action" value="addcompte" id="btnSave" <?= isset($_REQUEST["tel1"]) ? "" : "disabled" ?>>Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="container col-6">
                            <div class="container shadow p-1 mt-3 mb-3  rounded">
                                <form method="get">
                                    <div class="d-flex align-items-center p-2">
                                        <label for="inputTel" class="form-label  mx-3">Telephone</label>
                                        <input type="text" class="form-control" name="tel" id="inputTel" value="<?= $_REQUEST["tel"] ?? '' ?>">
                                        <input type="hidden" name="controller" value="compte">
                                        <button type="submit" class="btn btn-primary mx-3" name="action" value="findcompte" id="btnTel">Ok</button>

                                    </div>
                                </form>

                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-group col-5">
                                        <label for="nom">Nom :</label>
                                        <input type="text" class="form-control " id="nom" name="nom" value="<?= $comptes[0]->nom ?? '' ?>" disabled>
                                        <div class="div-error"> </div>
                                    </div>
                                    <div class="form-group col-5">
                                        <label for="prenom">Prénom :</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $comptes[0]->prenom ?? '' ?>" disabled>
                                        <div class="div-error"> </div>
                                    </div>
                                </div>

                                <table class="table table-bordered table-hover mt-3">
                                    <thead>
                                        <tr>

                                            <th scope="col">Numero</th>
                                            <th scope="col">Solde (FCFA)</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tBody">
                                        <?php if (isset($comptes)) : foreach ($comptes as $compte) : ?>
                                                <tr>
                                                    <td><?= $compte->numero ?></td>
                                                    <td><?= $compte->solde ?></td>
                                                    <td><a href=<?= WEBROOT . "?controller=transaction&key=$compte->idc&action=liste" ?>>Voir trans.</a></td>
                                                </tr>
                                        <?php endforeach;
                                        endif ?>
                                    </tbody>
                                </table>
                                <nav aria-label="..." class="d-flex align-items-center justify-content-center">
                                    <ul class="pagination" id="pagination">

                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>