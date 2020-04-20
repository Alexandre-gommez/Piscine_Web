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
    $(document).ready(function(){
      $('.header').height($(window).height());
    });
  </script>
  <style>
    a:hover{
      opacity:30%;
    }
    .cropping{
      overflow:hidden;
      height:120px;
      width:120px;
    }
  </style>
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
        <li class="nav-item"><a class="nav-link" id="nav1" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" id="nav2" href="vendre.php">Vendre</a></li>
        <li class="nav-item"><a class="nav-link" id="nav3" href="FrontAffichage.php">Acheter</a></li>
        <li class="nav-item"><a class="nav-link" id="nav4" href="#">Mon Compte</a></li>
        <li class="nav-item"><a class="nav-link" id="nav5" href="Admin.php">Admin</a></li>
        <li class="nav-item"><a class="nav-link" id="nav6" href="panier.php">Panier</a></li>
        <li class="nav-item"><a class="nav-link" id="nav7" href="deconnexion.php">Deconnexion</a></li>
      </ul>
    </div>
  </nav>
  <br>
  <br>
  <div class="container">
    <h4 class="mb-3" style="text-align:center">Votre compte</h4>
    
    <div class="col-md-10" style="margin:auto  ">
      <div style="background-image: url('');">
        <h5>Type</h5>
        <a id="role1" href="#" class="badge badge-warning badge-pill">Admin</a>
        <a id="role2" href="swap.php" class="badge badge-success badge-pill">Vendeur</a>
        <a id="role3" href="swap.php" class="badge badge-dark badge-pill">Acheteur</a>
        
        <hr>
      </div>

      <a id="role4" href="#" class="float-right" style="color:black">Supprimer</a>
      <span class="float-right">&nbsp;ou&nbsp; </span>
      <a id="role4" href="#"  class="float-right" style="color:black"> Importer une bannière</a>

      <?php
      include 'loginBDD.php'; 
      $temp=mysqli_query($db_handle,"SELECT * FROM Personne WHERE id='".$_SESSION['Id']."';");
      $info=mysqli_fetch_assoc($temp);

      echo "<div class=\"container\">";
      echo "<div class=\"row\">";
      echo "<div class=\"col\">";
      echo "<div class=\"cropping\">";
      echo "<div class=\"text-center\">";
      echo "<img src=".$info['adresse2']." style=\"height:120px\">";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "<br>";
      echo "<div class=\"row\">";
      echo "<div class=\"col\">";
      echo "<h5>Nom</h5>";
      echo "<p>".$info['Nom']."</p>";
      echo "</div>";
      echo "<div class=\"col\">";
      echo "<h5>Prenom</h5>";
      echo "<p>".$info['Prenom']."</p>";
      echo "</div>";
      echo "<div class=\"w-100\"></div>";
      echo "<div class=\"col\">";
      echo "<h5>Identifiant</h5>";
      echo "<p>".$info['username']."</p>";
      echo "</div>";
      echo "<div class=\"col\">";
      echo "<h5>Email</h5>";
      echo "<p>".$info['Mail']."</p>";
      echo "</div>";
      echo "<div class=\"w-100\"></div>";
      echo "<div class=\"col\">";
      echo "<h5>Adresse</h5>";
      echo "<p>".$info['adresse1']."  ".$info['adresse2']."</p>";
      echo "<p>".$info['CodePostal']."  ".$info['ville']." ".$info['Pays']."</p>";
      echo "</div>";
      echo "<div class=\"col\">";
      echo "</div>";
      echo "</div>";
      echo "<hr>";
      echo "<button id=\"edit\" class=\"btn btn-primary\">Modifier les infos</button>";
      echo "</div>";
      echo "<br>";
      echo "<form id=\"formedit\" role=\"form\" action=\"creationPersonne.php\" method=\"post\">";
      echo "<div class=\"form-group\">";
      echo "<div class=\"form-row\">";
      echo "<div class=\"form-group col-md-4\">";
      echo "<label for=\"nom\">Nom</label>";
      echo "<input type=\"text\" value=".$info['Nom']." class=\"form-control\" id=\"nom\" name=\"nom\" required>";
      echo "<span id=\"nom_manquant\"></span>";
      echo "</div>";  
      echo '<div class="form-group col-md-4">';
      echo '<label for="prenom">Prenom</label>';
      echo '<input type="text" value='.$info['Prenom'].' class="form-control" id="prenom" name="prenom" required>';
      echo '<span id="prenom_manquant"></span>';
      echo '</div>';
      echo '<div class="form-group col-md-4">';
      echo '<label for="img">Image de profil</label>';
      echo '<input type="file" class="form-control" id="img" name="img" accept="image/png, image/jpg, image/jpeg">';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="form-row">';
      echo '<div class="form-group col-md-6">';
      echo '<label for="email">Email</label>';
      echo '<input type="email" value='.$info['Mail'].' class="form-control" id="email" name="email" required>';
      echo '<span id="email_manquant"></span>';
      echo '</div>';
      echo '<div class="form-group col-md-6">';
      echo '<label for="username">Nom d\'utilisateur</label>';
      echo '<input type="text" value='.$info['username'].' class="form-control" id="username" name="username" required>';
      echo '<span id="username_manquant"></span>';
      echo '</div>';
      echo '</div>';
      echo '<div class="form-row">';
      echo '<div class="form-group col-md-6">';
      echo '<label for="Password1">Password</label>';
      echo '<input type="password" class="form-control" id="Password1" name="Password1" required>';
      echo '<span id="pass_manquant"></span>';
      echo '</div>';
      echo '<div class="form-group col-md-6">';
      echo '<label for="Password2">Password</label>';
      echo '<input type="password" class="form-control" id="Password2" required>';
      echo '<span id="pas2_manquant"></span>';
      echo '</div>';
      echo '</div>';
      echo '<div class="form-group">';
      echo '<label for="adress1">Addresse</label>';
      echo '<input type="text" value="'.$info['adresse1'].'" class="form-control" id="adress1" name="adress1" placeholder="1 rue ece" required>';
      echo '<span id="adress_manquant"></span>';
      echo '</div>';
      echo '<div class="form-group">';
      echo '<label for="adress2">Addresse 2</label>';
      echo '<input type="text"  class="form-control" id="adress2" name="adress2" value='.$info['adresse2'].'>';
      echo '</div>';
      echo '<div class="form-row">';
      echo '<div class="form-group col-md-6">';
      echo '<label for="ville">Ville</label>';
      echo '<input type="text" value='.$info['ville'].' class="form-control" id="ville" name="ville" required>';
      echo '<span id="ville_manquant"></span>';
      echo '</div>';
      echo '<div class="form-group col-md-2">';
      echo '<label for="pays">Pays</label>';
      echo '<input type="text" value='.$info['Pays'].' class="form-control" id="pays" name="pays" required>';
      echo '<span id="pays_manquant"></span>';
      echo '</div>';
      echo '<div class="form-group col-md-4">';
      echo '<label for="cp">Code Postal</label>';
      echo '<input type="text" value='.$info['CodePostal'].' class="form-control" id="cp" name="cp" required>';
      echo '<span id="cp_manquant"></span>';
      echo '</div>';
      ?>
    </div>
    <input type="reset" onclick="location.href='compte.php'" class="btn btn-secondary" value="Annuler">
    <button type="submit" id="save" class="btn btn-primary">Sauvegarder</button>
    <br>
    <br>
    <br>
  </form>
</div>
</div>
</div>
</div>

<script>        
  var form1 = document.getElementById('formedit');
  form1.style.display = 'none';

  var role1 = document.getElementById("role1");
  var role2 = document.getElementById("role2");
  var role3 = document.getElementById("role3");

  role1.style.display = 'none';

  var edit = document.getElementById("edit");
  var sauver = document.getElementById("save");

  var nom = document.getElementById("nom");
  var nmanquant = document.getElementById("nom_manquant");

  var prenom = document.getElementById("prenom");
  var pnmanquant = document.getElementById("prenom_manquant");

  var username = document.getElementById("username");
  var umanquant = document.getElementById("username_manquant");

  var mail = document.getElementById("email");
  var mmanquant = document.getElementById("email_manquant");

  var pass = document.getElementById("Password1");
  var pmanquant = document.getElementById("pass_manquant");

  var pass2 = document.getElementById("Password2");
  var p2manquant = document.getElementById("pas2_manquant");

  var adress = document.getElementById("adress1");
  var amanquant = document.getElementById("adress_manquant");

  var pays = document.getElementById("pays");
  var paysmanquant = document.getElementById("pays_manquant");

  var ville = document.getElementById("ville");
  var vmanquant = document.getElementById("ville_manquant");

  var cp = document.getElementById("cp");
  var cpmanquant = document.getElementById("cp_manquant");
  
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


  edit.addEventListener('click',editionopen);
  sauver.addEventListener('click',validation);

  rolechoice();

  function rolechoice()
  {
    <?php 
    if(($_SESSION['role'])==1)
    {
      echo "role3.classList.remove('badge-dark');";
      echo "role3.classList.add('badge-success');";
      echo "role2.classList.remove('badge-success');";
      echo "role2.classList.add('badge-dark');";
      echo "role3.href =\"#\";";
      echo "elem4.style.display = 'block';";
      echo "elem6.style.display = 'block';";
      echo "elem7.style.display = 'block';";
      echo "btnco.style.display = 'none';";
      echo "elem4.href =\"compte.php\";";
    }
    if(($_SESSION['role'])==2)
    {
      echo "role2.href =\"#\";";
      echo "elem2.style.display = 'block';";
      echo "elem4.style.display = 'block';";
      echo "elem7.style.display = 'block';";
      echo "btnco.style.display = 'none';";
      echo "elem4.href =\"compte.php\";";
    }
    else if(($_SESSION['role'])==3)
    {
      echo "role1.style.display = 'block';";
      echo "role2.style.display = 'none';";
      echo "role3.style.display = 'none';";
      echo "elem4.style.display = 'block';";
      echo "elem5.style.display = 'block';";
      echo "elem7.style.display = 'block';";
      echo "btnco.style.display = 'none';";
      echo "elem4.href =\"compte.php\";";
    }
    ?>
  }
  function editionopen()
  {
    form1.style.display = 'block';
    edit.style.display = 'none';
  }
  function validation(res)
  {
    if(dat.validity.valueMissing)
    {
     res.preventDefault();
     datmanquant.textContent = "Entrez la date d'expiration";
     datmanquant.style.color = 'red';
     datmanquant.style.display = 'block';
   }
   else{
    datmanquant.style.display = 'none';
  }
  if(cvv.validity.valueMissing)
  {
   res.preventDefault();
   cvvmanquant.textContent = "Entrez votre cvv";
   cvvmanquant.style.color = 'red';
   cvvmanquant.style.display = 'block';
 }
 else{
  cvvmanquant.style.display = 'none';
}
if(number.validity.valueMissing)
{
 res.preventDefault();
 numbermanquant.textContent = "Entrez un numéro de carte";
 numbermanquant.style.color = 'red';
 numbermanquant.style.display = 'block';
}
else{
  numbermanquant.style.display = 'none';
}
if(proprio.validity.valueMissing)
{
 res.preventDefault();
 propriomanquant.textContent = "Entrez le nom du propriétaire de la carte";
 propriomanquant.style.color = 'red';
 propriomanquant.style.display = 'block';
}
else{
  propriomanquant.style.display = 'none';
}
if(type.validity.valueMissing)
{
 res.preventDefault();
 typemanquant.textContent = "Entrez le type de carte";
 typemanquant.style.color = 'red';
 typemanquant.style.display = 'block';
}
else{
  typemanquant.style.display = 'none';
}
}

function validation()
{
  var i = 0;

  if(pass.validity.valueMissing)
  {
   pmanquant.textContent = "Entrez un mot de passe";
   pmanquant.style.color = 'red';
   pmanquant.style.display = 'block';
   i++;
 }
 else{
  pmanquant.style.display = 'none';
}
if(pass2.validity.valueMissing)
{
 p2manquant.textContent = "Entrez un mot de passe";
 p2manquant.style.color = 'red';
 p2manquant.style.display = 'block';
 i++;
}
else if(pass.value!=pass2.value)
{
 pmanquant.textContent = "Entrez deux mots de passes identiques";
 pmanquant.style.color = 'red';
 pmanquant.style.display = 'block';
 p2manquant.style.display = 'none';
 i++;
}
else{
  p2manquant.style.display = 'none';
}
if(username.validity.valueMissing)
{
 umanquant.textContent = "Entrez un nom d'utilisateur";
 umanquant.style.color = 'red';
 umanquant.style.display = 'block';
 i++;
}
else{
  umanquant.style.display = 'none';
}

if(nom.validity.valueMissing)
{
 nmanquant.textContent = "Entrez votre nom";
 nmanquant.style.color = 'red';
 nmanquant.style.display = 'block';
 i++;
}
else{
  nmanquant.style.display = 'none';
}
if(prenom.validity.valueMissing)
{
 pnmanquant.textContent = "Entrez votre prenom";
 pnmanquant.style.color = 'red';
 pnmanquant.style.display = 'block';
 i++;
}
else{
  pnmanquant.style.display = 'none';
}
if(mail.validity.valueMissing)
{
 mmanquant.textContent = "Entrez votre email";
 mmanquant.style.color = 'red';
 mmanquant.style.display = 'block';
 i++;
}
else{
  mmanquant.style.display = 'none';
}
if(adress.validity.valueMissing)
{
 amanquant.textContent = "Entrez votre adresse";
 amanquant.style.color = 'red';
 amanquant.style.display = 'block';
 i++;
}
else{
  amanquant.style.display = 'none';
}
if(pays.validity.valueMissing)
{
 paysmanquant.textContent = "Entrez votre pays";
 paysmanquant.style.color = 'red';
 paysmanquant.style.display = 'block';
 i++;
}
else{
  paysmanquant.style.display = 'none';
}
if(ville.validity.valueMissing)
{
 vmanquant.textContent = "Entrez votre ville";
 vmanquant.style.color = 'red';
 vmanquant.style.display = 'block';
 i++;
}
else{
  vmanquant.style.display = 'none';
}
if(cp.validity.valueMissing)
{
 cpmanquant.textContent = "Entrez votre code postal";
 cpmanquant.style.color = 'red';
 cpmanquant.style.display = 'block';
 i++;
}
else{
  cpmanquant.style.display = 'none';
}
if(i==0)
{
  form1.style.display = 'none';
  form2.style.display = 'block';
}
}
</script>
</body>
</html>