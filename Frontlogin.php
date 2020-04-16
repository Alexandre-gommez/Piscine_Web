<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>ECEY - Log In</title>
  </head>

  <body class="fade-in">
   <nav class="navbar navbar-expand-md shadow">
      <a class="navbar-brand" href="index.php">
          <img id="logo" src="logo.png" alt="">
        </a>
      <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#main-navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main-navigation">
          <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="index.php">Acceuil</a></li>
              <li class="nav-item"><a class="nav-link" href="product.html">Produits</a></li>
              <li class="nav-item"><a class="nav-link" href="#page-footer">Profil</a></li>
          </ul>
      </div>
  </nav>
  
   <img src="logo.png" class="img-fluid mx-auto d-block mt-5 pt-5" alt="Responsive image" width="120" height="240">
      
   <div class="container" >
   
   <div class="row justify-content-center align-items-center" style="height:79vh">
      
      <form class="needs-validation" novalidate  action="login.php" method="post">
            <div class="card text-center shadow p-3 mb-5" >
            <h3 >Connexion</h3>
            <div class="card-body">
                     <div class="form-group">
                        <label for="validation1">Identifiant</label>
                        <input type="text" class="form-control" id="username"  name="username" placeholder="Identifiant" required>
                        <span id="user_manquant"></span>
                     </div>
                     <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                        <span id="pass_manquant"></span>
                     </div>
                     <br>
                     <button type="submit" id="envoie" class="btn btn-primary">Connexion</button>
                     <button type="button" onclick="location.href='register.php'" class="btn btn-secondary">Créer un compte</button>
                     <br>
            </div>
            </div>
      </form>
      </div>
</div>

    <!-- Optional JavaScript -->
    <script>
       var validate = document.getElementById("envoie");
       var username = document.getElementById("username");
       var pass = document.getElementById("password");
       var umanquant = document.getElementById("user_manquant");
       var pmanquant = document.getElementById("pass_manquant");
       validate.addEventListener('click',valid);

       function valid(res)
       {
         if(pass.validity.valueMissing)
          {
             res.preventDefault();
             pmanquant.textContent = "Entrez un mot de passe";
             pmanquant.style.color = 'red';
             pmanquant.style.display = 'block';
          }
          else{
            pmanquant.style.display = 'none';
          }
          if(username.validity.valueMissing)
          {
             res.preventDefault();
             umanquant.textContent = "Entrez un nom d'utilisateur";
             umanquant.style.color = 'red';
             umanquant.style.display = 'block';
          }
          else{
            umanquant.style.display = 'none';
          }          

       }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>