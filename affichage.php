<?php

	include 'loginBDD.php';

	$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
	$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";
	
	if ($categorie==1&&$vente==1){
		$Enchere=mysqli_query($db_handle,"SELECT Objet FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT Objet FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT Objet FROM Offre");
	}else if ($categorie==1&&$vente==2){

	}else if ($categorie==1&&$vente==3){
		
	}else if ($categorie==1&&$vente==4){
		
	}else if ($categorie==2&&$vente==1){
		
	}else if ($categorie==2&&$vente==2){
		
	}else if ($categorie==2&&$vente==3){
		
	}else if ($categorie==2&&$vente==4){
		
	}else if ($categorie==3&&$vente==1){
		
	}else if ($categorie==3&&$vente==2){
		
	}else if ($categorie==3&&$vente==3){
		
	}else if ($categorie==3&&$vente==4){
		
	}else if ($categorie==4&&$vente==1){
		
	}else if ($categorie==4&&$vente==2){
		
	}else if ($categorie==4&&$vente==3){
		
	}else if ($categorie==4&&$vente==4){
		
	}

?>

