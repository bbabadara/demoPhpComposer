<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
        <div class="container d-flex justify-content-center align-items-center ">
            <h1>Ajout Compte</h1>
        </div>

        <div class="container d-flex align-items-md-center justify-content-around mt-2 ">
            <div class="container col-6">
                <div class="container shadow p-1  mb-3  rounded">
                    <form>
                        <div class="d-flex align-items-center p-2">
                            <label for="inputTel1" class="form-label  mx-3">Telephone</label>
                            <input type="text" class="form-control" name="date" id="inputTel1" />
                            <button type="button" class="btn btn-primary mx-3" id="btnTel1">Ok</button>

                        </div>
                    </form>

                    <div class="row ">
                        <div class="form-group col-6  ">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control " id="nom" name="nom1" disabled>
                            <div class="invalid-feedback"> </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="prenom">Prénom :</label>
                            <input type="text" class="form-control " id="prenom" name="prenom1" disabled>
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-6  ">
                            <label for="nom">Numero :</label>
                            <input type="text" class="form-control " id="nom" name="numero" >
                            <div class="invalid-feedback"> </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="prenom">Solde :</label>
                            <input type="text" class="form-control " id="solde" name="prenom" >
                            <div class="invalid-feedback"> </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary" id="btnSave">Enregistrer</button>
                    </div>
                </div>
            </div>

            <div class="container col-6">
                <div class="container shadow p-1 mt-3 mb-3  rounded">
                    <form>
                        <div class="d-flex align-items-center p-2">
                            <label for="inputTel" class="form-label  mx-3">Telephone</label>
                            <input type="text" class="form-control" name="date" id="inputTel" />
                            <button type="button" class="btn btn-primary mx-3" id="btnTel">Ok</button>

                        </div>
                    </form>

                    <div class="d-flex justify-content-around align-items-center">
                        <div class="form-group col-5">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control " id="nom" name="nom" disabled>
                            <div class="invalid-feedback"> </div>
                        </div>
                        <div class="form-group col-5">
                            <label for="prenom">Prénom :</label>
                            <input type="text" class="form-control " id="prenom" name="prenom" disabled>
                            <div class="invalid-feedback"> </div>
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
                            <tr>
                                <td>000</td>
                                <td>5789383</td>
                                <td><a href="#">Voir trans.</a></td>
                            </tr>

                        </tbody>
                    </table>
                    <nav aria-label="..." class="d-flex align-items-center justify-content-center">
                        <ul class="pagination" id="pagination">

                        </ul>
                    </nav>
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