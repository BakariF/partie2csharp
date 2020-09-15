<nav class="navbar navbar-expand-lg navbar-dark bg-info navbar-static-top">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link nav mb-0" href="index.php"><img src="../assets/img/logo.png" width="100" height="100" alt=""></span></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto text-warning h4">
          <li class="nav-item maRecherche">
            <a class="nav-link nav text-warning" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Rechercher
            </a>
          </li>
          <li class="nav-item mesFav">
            <a class="nav-link nav text-warning" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Favoris
            </a>
          </li>
          <li class="nav-item Support">
            <a class="nav-link nav text-warning" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Support
            </a>
          </li>
          <li class="nav-item dropdown monCompte">
            <a class="nav-link dropdown-toggle nav text-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mon compte
            </a>
            <div class="dropdown-menu bg-warning" aria-labelledby="navbarDropdown">
              <?php if (!isset($_SESSION['profile'])) { //Si l'utilisateur n'est pas connecté 
              ?>
                <a class="dropdown-item" href="login.php?view=login">Connexion</a>
                <a class="dropdown-item" href="register.php?view=register">Inscription</a>
              <?php } else { //Si la personne est connectée
              ?>
                <a class="dropdown-item" href="">Modifier son profil</a>
                <a class="dropdown-item" href="index.php?action=disconnect">Déconnexion</a>
              <?php } ?>
            </div>
          </li>
        </ul>
        <?= isset($_SESSION['profile']['firstname']['lastname']) ? 'Bienvenue ' . $_SESSION['profile']['firstname']['lastname'] : '' ?>
      </div>
    </nav>