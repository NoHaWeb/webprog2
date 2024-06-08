
    <div class="">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="text-strat">
                <a href="https://nohaweb.com" target="_blank"><img src="elemek/nohaweb_logo_100.png" class="img-responsive" alt="NoHaWEB"></a>
            </div>
            <div class="text-center">
                <h3 class="permanent-marker-regular">WAREHOUSE MANAGEMENT</h3>
            </div>
            <?php if (isset($_SESSION['id']) || !empty($_SESSION['id'])): ?>
            <div class="text-end">
                <a href="index.php?p=12" class="text-decoration-none px-2 text-black fw-bold">Profilom |</a>
                <a href="index.php?p=13"><button type="button" class="btn btn-info fw-bold">Kijelentkezés</button></a>
            </div>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" style="position: static; right: -50px" role="search" action="kereso.php" method="GET">
                <input type="search" class="form-control" placeholder="Keresés..." aria-label="Search" name="search">
                <button type="submit">Küldés</button>
            </form>

            <?php else: ?>
                <div class="text-end">
                <a href="index.php?p=1"><button type="button" class="btn btn-success btn-outline-light me-2">Bejelentkezés</button></a>
                <a href="index.php?p=2"><button type="button" class="btn btn-info">Regisztráció</button></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
