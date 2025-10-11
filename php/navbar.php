<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" href="index.php">Collection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link position-relative <?php if(basename($_SERVER['PHP_SELF']) == 'shop.php') echo 'active'; ?>" href="shop.php">Magasin
            <span class="position-absolute top-00 start-80 translate-middle p-1 bg-danger border border-light rounded-circle">
              <span class="visually-hidden">New alerts</span>
            </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'login.php') echo 'active'; ?>" href="login.php">Se connecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'drop_rates.php') echo 'active'; ?>" href="drop_rates.php">Infos sur les drop rates</a>
        </li>
      </ul>
      <span class="navbar-text">
        La collection de cartes ultime !
      </span>
    </div>
  </div>
</nav>