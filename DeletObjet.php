<?php
include "loginBDD.php";

$id=$_GET['ID'];
if($_SESSION['role']==1){
	$temp=mysqli_query($db_handle,"DELETE FROM ListeAchat WHERE Achat='".$id."';");
}
else  {
	$test1=mysqli_query($db_handle,"SELECT * FROM Ferraille WHERE Objet='".$id."';");
	if(mysqli_num_rows($test1)==1){
		$temp=mysqli_query($db_handle,"DELETE FROM Ferraille WHERE Objet='".$id."';");
	}
	$test2=mysqli_query($db_handle,"SELECT * FROM VIP WHERE Objet='".$id."';");
	if(mysqli_num_rows($test2)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM VIP WHERE Objet='".$id."';");
	}
	$test3=mysqli_query($db_handle,"SELECT * FROM Musee WHERE Objet='".$id."';");
	if(mysqli_num_rows($test3)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM Musee WHERE Objet='".$id."';");
	}
	$test4=mysqli_query($db_handle,"SELECT Id FROM Offre WHERE Objet='".$id."';");
	if(mysqli_num_rows($test4)!=0){
		$id_offre=mysqli_fetch_assoc($test4);
		$test41=mysqli_query($db_handle,"SELECT * FROM ListeOffres WHERE Referance='".$id_offre."';");
		if(mysqli_num_rows($test41)!=0)
		{
			$temp=mysqli_query($db_handle,"DELETE FROM ListeOffres WHERE Referance='".$id_offre."';");
		}
		$temp=mysqli_query($db_handle,"DELETE FROM Offre WHERE Objet='".$id."';");
	}
	$test5=mysqli_query($db_handle,"SELECT * FROM Achat WHERE Objet='".$id."';");
	if(mysqli_num_rows($test5)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM Achat WHERE Objet='".$id."';");
	}
	$test6=mysqli_query($db_handle,"SELECT * FROM ListeAchat WHERE Objet='".$id."';");
	if(mysqli_num_rows($test6)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM ListeAchat WHERE Objet='".$id."';");
	}
	$test7=mysqli_query($db_handle,"SELECT Id FROM Enchere WHERE Objet='".$id."';");
	if(mysqli_num_rows($test7)!=0){
		$id_enchere=mysqli_fetch_assoc($test7);
		$test71=mysqli_query($db_handle,"SELECT * FROM ListeEnchere WHERE Referance='".$id_enchere."';");
		if(mysqli_num_rows($test71)!=0)
		{
			$temp=mysqli_query($db_handle,"DELETE FROM ListeEnchere WHERE Referance='".$id_enchere."';");
		}
		$temp=mysqli_query($db_handle,"DELETE FROM Enchere WHERE Objet='".$id."';");
	}
	$test=mysqli_query($db_handle,"DELETE FROM Objet WHERE Id='".$id."';");
}

header("Location:index.php");
?>