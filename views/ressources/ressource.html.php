<!doctype html>
<html lang="en">

<head>
    <title>Ressource</title>
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
                <div class="container col-9 mt-3 mb-3 border shadow align-items-center justify-content-around rounded">
  
  <div class="col-12 mx-2 mb-1">
      <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Type Compte</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Type Transaction</button>
          </li>
      </ul>
      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active mt-2" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
              <form acton="" method="post" class="col-md-4 d-flex align-items-center mt-3 mx-5">
                  <label for="inputCity" class="form-label mx-3 ">Libelle</label>
                  <input type="text" class="form-control col-6" id="inputTel" name="libelletc">
                  <button name="addTypeC" value="addTypeC" type="submit" class="btn btn-primary mx-3" id="Valider">Ok</button>
              </form>
              <table class="table table-bordered mt-4 shadow col-5 ">
                  <thead>
                      <tr class="table-primary">
                          <th class="text-center"> Libelle </th>
                          <th class="text-center"> Actions </th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($ressources)) : ?>
                    <?php foreach($ressources as $types): ?>
                      <tr>
                          <td class="text-center"><?= $types->libelletc ?> </td>
                          <td class="text-center"> Supprimer</td>
                          <!-- <td class="text-center"> <a href="<?=WEBROOT?>/?controller=transaction&idcpt=<?= $cpt->idcpt ?>"> Transactions </a> </td> -->
                      </tr>
                      <?php endforeach ?>
                      <?php endif ?>
                  </tbody>
              </table>
            <div class=" container col-12 d-flex align-items-center justify-content-center mt-5">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination" id="paginationDemande">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>   
            </div>
          </div>
          <div class="tab-pane fade " id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <form acton="" method="post" class="col-md-4 d-flex align-items-center mt-3 mx-5">
                    <label for="inputCity" class="form-label mx-3 ">Libelle</label>
                    <input type="text" class="form-control col-6" id="inputTel" name="libelleTrans">
                    <button name="addTrans" value="addTrans" type="submit" class="btn btn-primary mx-3" id="Valider">Ok</button>
                </form>
              <table class="table table-bordered mt-4 shadow col-5 ">
                  <thead>
                      <tr class="table-primary">
                          <th class="text-center"> Libelle </th>
                          <th class="text-center"> Actions </th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($typeTrans)) : ?>
                    <?php foreach($typeTrans as $types): ?>
                      <tr>
                          <td class="text-center"><?= $types->libellet ?> </td>
                          <td class="text-center"> Supprimer</td>
                          <!-- <td class="text-center"> <a href="<?=WEBROOT?>/?controller=transaction&idcpt=<?= $cpt->idcpt ?>"> Transactions </a> </td> -->
                      </tr>
                      <?php endforeach ?>
                      <?php endif ?>
                  </tbody>
              </table>
              <div class=" container col-12 d-flex align-items-center justify-content-center mt-5">
                  <nav aria-label="Page navigation example">
                      <ul class="pagination" id="paginationDemande">
                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                  </nav>   
              </div>
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