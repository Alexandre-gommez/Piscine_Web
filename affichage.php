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
		a{
			text-decoration: none;
			color:black;
		}
		a:link{
			text-decoration: none!important;
			color:black;
		}
		a:hover{
			opacity:30%;
		}
		.cropping{
			overflow:hidden;
			width:auto;
			height:300px;
		}
	</style>

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
				<li class="nav-item"><a class="nav-link" id="nav2" href="">Vendre</a></li>
				<li class="nav-item"><a class="nav-link" id="nav3" href="#page-footer">Acheter</a></li>
				<li class="nav-item"><a class="nav-link" id="nav4" href="Frontlogin.php">Mon Compte</a></li>
				<li class="nav-item"><a class="nav-link" id="nav5" href="Admin.php">Admin</a></li>
				<li class="nav-item"><a class="nav-link" id="nav6" href="#page-footer">Panier</a></li>
				<li class="nav-item"><a class="nav-link" id="nav7" href="deconnexion.php">Deconnexion</a></li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid ">
		<div class="container">
			<?php

			include 'loginBDD.php';
			$cmpt=0;
			$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
			$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";

			if ($categorie==1&&$vente==1)
			{
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1)
					{
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
						echo "\n";
					}
					$cmpt++;
				}
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==1&&$vente==2){
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==1&&$vente==3){
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1){
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==1&&$vente==4){
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==2&&$vente==1)
			{
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM ferraille)");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1){
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM ferraille)");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM ferraille)");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==2&&$vente==2){
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM ferraille)");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==2&&$vente==3){
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM ferraille)");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1){
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==2&&$vente==4){
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM ferraille)");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==3&&$vente==1)
			{
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM Musee)");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1){
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM Musee)");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM Musee)");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==3&&$vente==2){
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM Musee)");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==3&&$vente==3){
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM Musee)");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1){
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==3&&$vente==4){
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM Musee)");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==4&&$vente==1)
			{
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM VIP)");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1){
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM VIP)");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM VIP)");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\">';
						echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==4&&$vente==2){
				$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM VIP)");
				while($liste1=mysqli_fetch_assoc($Achat))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==4&&$vente==3){
				$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM VIP)");
				while($liste1=mysqli_fetch_assoc($Enchere))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$date=$liste1['Fin'];
					$prix=$liste1['Prix'];
					$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'</span>';
					echo "\n";
					if(mysqli_num_rows($prix_enchere_temp)>1){
						$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
						echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
					}
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			else if ($categorie==4&&$vente==4){
				$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM VIP)");
				while($liste1=mysqli_fetch_assoc($Offre))
				{
					if($cmpt%2==0)
					{
						echo '<div class="row">';
					}
					$prix=$liste1['Prix'];
					$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
					$tab_objet=mysqli_fetch_assoc($objet);
					echo '<div class="row">';
					echo '<div class="col-sm-6 mb-5">';
					echo "\n";
					echo '<div class="card">';
					echo "\n";
					echo "<a href=\"#\" >";
					echo "<div class=\"cropping\">";
					echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
					echo "</div>";
					echo "\n";
					echo '<div class="card-body">';
					echo "\n";
					echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
					echo "\n";
					echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</a>';
					echo "\n";
					echo '<div class="card-footer">';
					echo "\n";
					echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'</span>';
					echo "\n";
					if($_SESSION['role']==3)
					{
						echo '<a href=\"DeletObjet.php?ID='.$liste1['Id'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
					}
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					echo '</div>';
					echo "\n";
					if($cmpt%2==1)
					{
						echo '</div>';
					}
					$cmpt++;
				}
				if($cmpt%2==0)
				{
					echo '</div>';
				}
				$cmpt=0;
			}
			?>
		</div>
	</div>
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
		if(isset($_SESSION['role']))
		{
			if($_SESSION['role']==1)
			{
				echo "elem4.style.display = 'block';";
				echo "elem6.style.display = 'block';";
				echo "elem7.style.display = 'block';";
				echo "btnco.style.display = 'none';";
				echo "elem4.href =\"compte.php\";";
			}
			else if($_SESSION['role']==2)
			{
				echo "elem2.style.display = 'block';";
				echo "elem4.style.display = 'block';";
				echo "elem7.style.display = 'block';";
				echo "btnco.style.display = 'none';";
				echo "elem4.href =\"compte.php\";";
			}
			else if($_SESSION['role']==3)
			{
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