
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <?php if (isset($_SESSION['id']) || !empty($_SESSION['id'])): ?>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
          <li><a href="index.php?p=12" class="nav-link px-2 text-secondary">Profilom</a></li>                    
        </ul>
        <div class="text-end">
            <a href="index.php?p=13"><button type="button" class="btn btn-warning">Kijelentkezés</button></a>
        </div>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form> -->

        <div class="text-end">
        <?php else: ?>
            <a href="index.php?p=1"><button type="button" class="btn btn-outline-light me-2">Bejelentkezés</button></a>
            <a href="index.php?p=2"><button type="button" class="btn btn-warning">Regisztráció</button></a>
          <?php endif; ?>
        </div>
      </div>
    </div>




    