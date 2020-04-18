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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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

	<form action="affichage.php" method="post">
		<select class="custom-select mr-sm-2" id="vente" name="vente">
			<option selected></option>
			<option value="1">Tout type d'achat</option>
			<option value="2">Achat direct</option>
			<option value="3">Enchere</option>
			<option value="4">Negociation</option>

		</select>
		<select class="custom-select mr-sm-2" id="categorie" name="categorie">
			<option selected></option>
			<option value="1">Toute categorie</option>
			<option value="2">Ferraille</option>
			<option value="3">Musée</option>
			<option value="4">VIP</option>
		</select>
		<button type="sumbit" class="btn btn-primary" id="valid2">Valider</button>
	</form>

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