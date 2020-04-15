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
  <title>ECEY - Inscription</title>
</head>

<script>
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>

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
  <img src="logo.png" class="img-fluid mx-auto d-block m-5" alt="Responsive image" width="120" height="240">

  <div class="container" >

    <div class="row justify-content-center align-items-center" style="height:79vh">
      <form class="needs-validation" novalidate action="creationPersonne.php" method="post">
        <div class="card text-center shadow p-3 mb-5" style="background-color: rgb(250, 250, 250);">
          <h3 class="card-header" style="background-image: linear-gradient(rgb(0,123,255), rgb(102, 143, 255)); color: white">S'inscrire</h3>
          <div   class="card-body">
            <div id="form1">
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
              <input type="button" value="Suivant" class="btn btn-primary" id="valid1"></input>
            </div>

            <div id="form2">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="number1">Numéro de carte</label>
                  <input type="text" class="form-control" id="number1" name="number1" required>
                  <span id="nb_manquant"></span>
                </div>
                <div class="form-group col-md-6">
                  <label for="proprio">Prenom Nom</label>
                  <input type="text" class="form-control" id="proprio" name="proprio" required>
                  <span id="proprio_manquant"></span>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="cvv">CVV</label>
                  <input type="text" class="form-control" id="cvv" name="cvv" required>
                  <span id="cvv_manquant"></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="date">Date</label>
                  <input type="text" class="form-control" id="date" name="date" placeholder="MM/YY" required>
                  <span id="date_manquant"></span>
                </div>
                <div class="form-group col-md-7">
                  <label for="type">Type de carte</label>
                  <select class="custom-select mr-sm-2" id="type" name="type" required>
                    <option selected></option>
                    <option value="1">Mastercard</option>
                    <option value="2">Visa</option>
                    <option value="3">American Express</option>
                  </select>
                  <span id="type_manquant"></span>
                </div>
              </div>

              <input type="button" value="Retour" class="btn btn-secondary" id="retour"></input>
              <button type="submit" class="btn btn-primary" id="valid2"> Valider </button>

            </div>


          </div>
        </div>
      </form>
    </div>
  </div>


  <!-- JavaScript -->
  <script>

    var validate1 = document.getElementById("valid1");
    var validate2 = document.getElementById("valid2");
    var retour = document.getElementById("retour");

    var form1 = document.getElementById('form1');
    var form2 = document.getElementById('form2');

    var number = document.getElementById("number1");
    var numbermanquant = document.getElementById("nb_manquant");

    var proprio = document.getElementById("proprio");
    var propriomanquant = document.getElementById("proprio_manquant");

    var dat = document.getElementById("date");
    var datmanquant = document.getElementById("date_manquant");

    var type = document.getElementById("type");
    var typemanquant = document.getElementById("type_manquant");

    var cvv = document.getElementById("cvv");
    var cvvmanquant = document.getElementById("cvv_manquant");

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

    validate1.addEventListener('click',validation);
    validate2.addEventListener('click',validation2);
    retour.addEventListener('click',back);

    form2.style.display = 'none';

    function validation2(res)
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
function back()
{
  form2.style.display = 'none';
  form1.style.display = 'block';
}
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>