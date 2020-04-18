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
  <br>
  <br>
  <div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Identifiant</th>
      <th style="width:  8.33%"></th>
    </tr>
  </thead>
  <tbody>
  <?php
include "loginBDD.php";

$boucle=mysqli_query($db_handle,"SELECT * FROM Histovendeur");
while($liste=mysqli_fetch_assoc($boucle))
{
      $temp=mysqli_query($db_handle,"SELECT * FROM Personne WHERE id='".$liste['Personne']."';");
      $info=mysqli_fetch_assoc($temp);

      echo '<tr>';
      echo '<td>'.$info['Nom'].'</td>';
      echo '<td>'.$info['Prenom'].'</td>';
      echo '<td>'.$info['username'].'</td>';
      echo '<td>';
      echo '<a href="DeleteVendeur.php?ID='.$liste['Personne'].'" style="color:red">';
      echo '<div>';
      echo 'supprimer';
      echo '</div>';
      echo '</td>';
      echo '</tr>';
}
      ?>
  
  </tbody>
</table>

</body>