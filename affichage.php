<?php

	include 'loginBDD.php';

	$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
	$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";
	echo $categorie;

?>

