<div class="col-auto  col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href=<?= WEBROOT . "?controller=compte" ?> class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Comptes</span> </a>
            </li>

            <li>
                <a href=<?= WEBROOT . "?controller=ressource" ?> class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Ressource</span></a>
            </li>

            <li>
                <a href=<?= WEBROOT . "?controller=securite" ?>> <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Securite</span> </a>

            </li>

        </ul>
    </div>
</div>