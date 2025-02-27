<!doctype html>
<html lang="en">

<head>
    <title>Transaction</title>
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
                <?= require_once ROOT."/views/partials/menu.html.php"?>

                <div class="col py-3">
                    <div class="container d-flex justify-content-center align-items-center ">
                        <h1>Transactions</h1>
                    </div>

                    <div class="container d-flex align-items-md-center justify-content-around mt-2 ">
                        <div class="container col-6">
                            <div class="container shadow p-1 mt-3 mb-3  rounded">
                                <div class="container  p-2">
                                    <p>Nom: <span><?= $compte->nom ?></span></p>
                                    <p>Prenom: <span><?= $compte->prenom ?></span></p>
                                </div>
                                <form method="get">
                                    <div class="d-flex align-items-center p-2">
                                        <label for="SelectType" class="form-label  mx-3">Type</label>
                                        <select class="form-select" aria-label="Default select example" name="type" id="selectType">
                                            <option value="" <?= isset($_GET["type"]) && $_GET["type"] == "" ? "selected" : "" ?>>Tous</option>
                                            <option value="depot" <?= isset($_GET["type"]) && $_GET["type"] == "depot" ? "selected" : "" ?>>Depot</option>
                                            <option value="retrait" <?= isset($_GET["type"]) && $_GET["type"] == "retrait" ? "selected" : "" ?>>Retrait</option>
                                        </select>
                                        <input type="hidden" name="controller" value="transaction">
                                        <input type="hidden" name="key" value="<?= $compte->idc ?>">
                                        <button type="submit" class="btn btn-primary mx-3" name="action" value="filter" id="btnFilter">Ok</button>

                                    </div>
                                </form>

                                <table class="table table-bordered table-hover mt-3">
                                    <thead>
                                        <tr>

                                            <th scope="col">Date</th>
                                            <th scope="col">Montant (FCFA)</th>
                                            <th scope="col">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tBody">
                                        <?php if (isset($transactions)) : foreach ($transactions as $transaction) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $transaction->datet ?>
                                                    </td>
                                                    <td>
                                                        <?= $transaction->montant ?>
                                                    </td>
                                                    <td>
                                                        <?= $transaction->libtt ?>
                                                    </td>
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

                        <div class="container col-6">
                            <div class="container shadow p-3  mb-3  rounded">
                                <div class="container  p-2">
                                    <p>Numero: <span><?= $compte->numero ?></span></p>
                                    <p>Solde: <span><?= $compte->solde ?> FCFA</span></p>
                                </div>

                                <form action="" method="post">
                                    <div class=" d-flex flex-column align-items-center justify-content-around">
                                        <div class="d-flex align-items-center col-8">
                                            <label for="inputTel" class="form-label  mx-3">Type:</label>
                                            <select class="form-select" aria-label="Default select example" name="type" id="selectType">
                                                <option value="depot">Depot</option>
                                                <option value="retrait">Retrait</option>
                                            </select>

                                        </div>
                                        <div class="d-flex align-items-center col-8 mt-3">
                                            <label for="montant" class="form-label mx-1">Montant:</label>
                                            <input type="text" class="form-control " id="montant" name="montant">
                                            <div class="invalid-feedback"> </div>
                                        </div>
                                        <input type="hidden" name="controller" value="transaction">
                                        <input type="hidden" name="idc" value="<?= $compte->idc ?>">
                                        <button type="submit" class="btn btn-primary mt-2 col-4" name="action" value="addTransaction" id="btnSave">Enregistrer</button>

                                    </div>
                                </form>

                            </div>

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