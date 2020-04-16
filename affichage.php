<?php

	include 'loginBDD.php';

	$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
	$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";
	
	if ($categorie==1&&$vente==1){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==1&&$vente==2){
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
	}else if ($categorie==1&&$vente==3){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
	}else if ($categorie==1&&$vente==4){
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==2&&$vente==1){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==2&&$vente==2){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==2&&$vente==3){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==2&&$vente==4){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==3&&$vente==1){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==3&&$vente==2){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==3&&$vente==3){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==3&&$vente==4){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==4&&$vente==1){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==4&&$vente==2){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==4&&$vente==3){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}else if ($categorie==4&&$vente==4){
		$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
		$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
		$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	}

?>

