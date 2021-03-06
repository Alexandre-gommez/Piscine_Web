<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <title>ECEY</title>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Arapey&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="css/landing-page.min.css" rel="stylesheet">
  <script type="text/javascript" src="scripts.js"></script>
  <script>
    $(document).ready(function() {
      $('.header').height($(window).height());
    });
  </script>

</head>

<body class="fade-in">
  <nav class="navbar navbar-expand-md shadow">
    <a class="navbar-brand" href="#">
      <img id="logo" src="logo.png" alt="">
    </a>
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#main-navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" id="nav1" href="#">Acceuil</a></li>
        <li class="nav-item"><a class="nav-link" id="nav2" href="vendre.php">Vendre</a></li>
        <li class="nav-item"><a class="nav-link" id="nav3" href="#">Acheter</a></li>
        <li class="nav-item"><a class="nav-link" id="nav4" href="Frontlogin.php">Mon Compte</a></li>
        <li class="nav-item"><a class="nav-link" id="nav5" href="Admin.php">Admin</a></li>
        <li class="nav-item"><a class="nav-link" id="nav6" href="#">Panier</a></li>
        <li class="nav-item"><a class="nav-link" id="nav7" href="deconnexion.php">Deconnexion</a></li>
      </ul>
    </div>
  </nav>
  <header class="page-header header container-fluid">
    <div class="overlay"></div>
    <div class="description justify-content-center">
      <img id="logo" src="logo.png" alt="">
      </a>
      <p>
        Le meilleur site d'achat et vente en France
      </p>
      <button onclick="window.location.href = 'Frontlogin.php';" class="btn btn-outline-secondary btn-lg" id="btnconnexion">Se Connecter!</button>
    </div>

  </header>
  <br>
  <br>
  <section class="page-section" id="services">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-6">
          <h4>Achetez</h4>
          <br>
          <img id="logo" src="shopping-cart.svg" alt="">
          <br>
          <br>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-6">
          <h4>Vendez</h4>
          <br>
          <img id="logo" src="shopping-bag.svg" alt="">
          <br>
          <br>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
    </div>
  </section>
  <br>
  <br>
  <!-- Footer -->
  <footer class="footer" style="background-color:black;">
    <div style="text-align :center; padding-top :1%;">
      <a style="color:LightGrey;" href="mailto:victor.thevin@edu.ece.fr">Cliquer ici pour nous contacter !</a>
      <div class="footer-copyright text-center py-3">&copy; 2020 Copyright : Alexandre GOMMEZ & Julien TERRIER & Victor THEVIN
      </div>
    </div>
  </footer>

  <script>
    var elem1 = document.getElementById("nav1");
    var elem2 = document.getElementById("nav2");
    var elem3 = document.getElementById("nav3");
    var elem4 = document.getElementById("nav4");
    var elem5 = document.getElementById("nav5");
    var elem6 = document.getElementById("nav6");
    var elem7 = document.getElementById("nav7");

    var btnco = document.getElementById("btnconnexion");

    elem2.style.display = 'none';
    elem5.style.display = 'none';
    elem6.style.display = 'none';
    elem7.style.display = 'none';

    <?php
    if (isset($_SESSION['role'])) {
      if ($_SESSION['role'] == 1) {
        echo "elem4.style.display = 'block';";
        echo "elem6.style.display = 'block';";
        echo "elem7.style.display = 'block';";
        echo "btnco.style.display = 'none';";
        echo "elem4.href =\"compte.php\";";
      } else if ($_SESSION['role'] == 2) {
        echo "elem2.style.display = 'block';";
        echo "elem4.style.display = 'block';";
        echo "elem7.style.display = 'block';";
        echo "btnco.style.display = 'none';";
        echo "elem4.href =\"compte.php\";";
      } else if ($_SESSION['role'] == 3) {
        echo "elem4.style.display = 'block';";
        echo "elem5.style.display = 'block';";
        echo "elem7.style.display = 'block';";
        echo "btnco.style.display = 'none';";
        echo "elem4.href =\"compte.php\";";
      }
    }

    ?>
  </script>
</body>

</html>

<!--https://medium.com/cloud-native-the-gathering/how-to-use-css-to-fade-in-and-fade-out-html-text-and-pictures-f45c11364f08
        https://getbootstrap.com/docs/4.4
    -->