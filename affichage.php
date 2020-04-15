<?php

	include 'loginBDD.php';

	$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
	$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";
	
	if ($categorie==0&&$vente==0){
		$objets=mysqli_query($db_handle,)
	}else if ($categorie==0&&$vente==1){

	}else if ($categorie==0&&$vente==2){
		
	}else if ($categorie==0&&$vente==3){
		
	}else if ($categorie==1&&$vente==0){
		
	}else if ($categorie==1&&$vente==1){
		
	}else if ($categorie==1&&$vente==2){
		
	}else if ($categorie==1&&$vente==3){
		
	}else if ($categorie==2&&$vente==0){
		
	}else if ($categorie==2&&$vente==1){
		
	}else if ($categorie==2&&$vente==2){
		
	}else if ($categorie==2&&$vente==3){
		
	}else if ($categorie==3&&$vente==0){
		
	}else if ($categorie==3&&$vente==1){
		
	}else if ($categorie==3&&$vente==2){
		
	}else if ($categorie==3&&$vente==3){
		
	}

?>

