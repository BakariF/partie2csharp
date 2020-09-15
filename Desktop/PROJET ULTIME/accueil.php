<?php
session_start();
include_once 'config.php';
include 'lang/FR_FR.php';
include 'controllers/registerCTRL.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <link href="../assets/css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <title><?= isset($title) ? $title : '' ?></title>
</head>

<body id="bg-body">
  <div class="container-row">
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
    <?php
    if (isset($view)) { //Affichage de la vue sélectionnée
      include 'views/' . $view . '.php';
    } else { ?>
      <h1 class="text-center">Accueil</h1>
    <?php }
    ?>
    <footer class="page-footer font-small pt-4 fixed-bottom bg-info">
      <div class="container-fluid text-center text-md-left">
        <div class="row text-warning">
          <div class="col-md-6 mt-md-0 mt-3">
            <h5 class="text-uppercase">N'vestor</h5>
            <p>Ici je rédige ma présentation de site.</p>
          </div>
          <hr class="clearfix w-100 d-md-none pb-3">
          <div class="col-md-6 mb-md-0 mb-6">
            <h5 class="text-uppercase">Support</h5>
            <ul class="list-unstyled">
              <li>
                <a>Article 1</a>
              </li>
              <li >
                <a>Article 2</a>
              </li>
              <li>
                <a>Article 3</a>
              </li>
              <li>
                <a>Article 4</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright text-center py-3 bg-warning">© 2020 Copyright
      </div>
    </footer>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</html>