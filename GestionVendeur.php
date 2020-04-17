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
<body>
	
<?php
include "loginBDD.php";

$boucle=mysqli_query($db_handle,"SELECT * FROM Histovendeur");
while($liste=mysqli_fetch_assoc($boucle))
{
	  $temp=mysqli_query($db_handle,"SELECT * FROM Personne WHERE id='".$liste['Personne']."';");
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
      echo "<p>".$info['adresse1']."  ".$info['adresse2']."</p>";
      echo "<p>".$info['CodePostal']."  ".$info['ville']." ".$info['Pays']."</p>";
      echo "</div>";
      echo "</div>";
      echo "<button onclick=\"window.location.href = 'DeleteVendeur.php';\"class=\"btn btn-outline-secondary btn-lg\" >Supprimer </button>";
}
?>
</body>
</html>