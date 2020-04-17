
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
  
</head>
<body class="fade-in">
  <nav class="navbar navbar-expand-md shadow">
    <a class="navbar-brand" href="index.html">
      <img id="logo" src="logo.png" alt="">
    </a>
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#main-navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Vendre</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Acheter</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Mon compte</a></li>
      </ul>
    </div>
  </nav>
  <br>
  <br>
<div class="container">
    <h4 class="mb-3" style="text-align:center">Votre compte</h4>
    <div class="col-md-10" style="margin:auto">
      <h5>Type</h5>
      <div id="role1">
        <a  href="#" class="badge badge-warning badge-pill">Admin</a>
      </div>
      <a id="role2" href="#" class="badge badge-success badge-pill">Vendeur</a>
      <a id="role3" href="#" class="badge badge-dark badge-pill">Acheteur</a>
      <hr>
      
      <?php
      include 'loginBDD.php'; 
      $temp=mysqli_query($db_handle,"SELECT * FROM Personne WHERE id='".$_SESSION['Id']."';");
      $info=mysqli_fetch_assoc($temp);

      echo "<div class=\"container\">";
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
      echo "<p>".$info['adresse1']."</p>";
      echo "</div>";
      echo "</div>";
      echo "<button id=\"edit\" class=\"btn btn-primary\">Modifier les infos</button>";
      echo "</div>";
      ?>
      
      
      <br>

      <form id="formedit" role="form">
        <div class="form-group">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" required>
              <span id="nom_manquant"></span>
            </div>
            <div class="form-group col-md-4">
              <label for="prenom">Prenom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" required>
              <span id="prenom_manquant"></span>
            </div>
            <div class="form-group col-md-4">
              <label for="role">Role</label>
              <select class="custom-select mr-sm-2" id="role" name="role" required>
                <option selected></option>
                <option value="1">Vendeur</option>
                <option value="2">Acheteur</option>
              </select>
              <span id="role_manquant"></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <span id="email_manquant"></span>
            </div>
            <div class="form-group col-md-6">
              <label for="username">Nom d'utilisateur</label>
              <input type="text" class="form-control" id="username" name="username" required>
              <span id="username_manquant"></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Password1">Password</label>
              <input type="password" class="form-control" id="Password1" name="Password1" required>
              <span id="pass_manquant"></span>
            </div>
            <div class="form-group col-md-6">
              <label for="Password2">Password</label>
              <input type="password" class="form-control" id="Password2" required>
              <span id="pas2_manquant"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="adress1">Addresse</label>
            <input type="text" class="form-control" id="adress1" name="adress1" placeholder="1 rue ece" required>
            <span id="adress_manquant"></span>
          </div>
          <div class="form-group">
            <label for="adress2">Addresse 2</label>
            <input type="text" class="form-control" id="adress2" name="adress2" >
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="ville">Ville</label>
              <input type="text" class="form-control" id="ville" name="ville" required>
              <span id="ville_manquant"></span>
            </div>
            <div class="form-group col-md-2">
              <label for="pays">Pays</label>
              <input type="text" class="form-control" id="pays" name="pays" required>
              <span id="pays_manquant"></span>
            </div>
            <div class="form-group col-md-4">
              <label for="cp">Code Postal</label>
              <input type="text" class="form-control" id="cp" name="cp" required>
              <span id="cp_manquant"></span>
            </div>
          </div>
          <input type="reset" onclick="location.href='profile.php'" class="btn btn-secondary" value="Annuler">
          <input type="button" id="save" class="btn btn-primary" value="Sauvegarder">

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

  var role = document.getElementById("role");
  var rmanquant = document.getElementById("role_manquant");

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
    }
    else if(($_SESSION['role'])==3)
    {
      echo "role1.style.display = 'block';";
      echo "role2.style.display = 'none';";
      echo "role3.style.display = 'none';";
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
if(role.validity.valueMissing)
{
 rmanquant.textContent = "Entrez votre role";
 rmanquant.style.color = 'red';
 rmanquant.style.display = 'block';
 i++;
}
else{
  rmanquant.style.display = 'none';
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