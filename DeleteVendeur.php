<?php
include "loginBDD.php";
$id=$_GET['ID'];
$boucle=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Vendeur='".$id."';");
while($liste=mysqli_fetch_assoc($boucle))
{
	$test1=mysqli_query($db_handle,"SELECT * FROM Ferraille WHERE Objet='".$liste['Id']."';");
	if(mysqli_num_rows($test1)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM Ferraille WHERE Objet='".$liste['Id']."';");
	}
	$test2=mysqli_query($db_handle,"SELECT * FROM VIP WHERE Objet='".$liste['Id']."';");
	if(mysqli_num_rows($test2)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM VIP WHERE Objet='".$liste['Id']."';");
	}
	$test3=mysqli_query($db_handle,"SELECT * FROM Musee WHERE Objet='".$liste['Id']."';");
	if(mysqli_num_rows($test3)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM Musee WHERE Objet='".$liste['Id']."';");
	}
	$test4=mysqli_query($db_handle,"SELECT Id FROM Offre WHERE Objet='".$liste['Id']."';");
	if(mysqli_num_rows($test4)!=0){
		$id_offre=mysqli_fetch_assoc($test4);
		$test41=mysqli_query($db_handle,"SELECT * FROM ListeOffres WHERE Referance='".$id_offre['Id']."';");
		if(mysqli_num_rows($test41)!=0)
		{
			$temp=mysqli_query($db_handle,"DELETE FROM ListeOffres WHERE Referance='".$id_offre['Id']."';");
		}
		$temp=mysqli_query($db_handle,"DELETE FROM Offre WHERE Objet='".$liste['Id']."';");
	}
	$test5=mysqli_query($db_handle,"SELECT * FROM Achat WHERE Objet='".$liste['Id']."';");
	if(mysqli_num_rows($test5)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM Achat WHERE Objet='".$liste['Id']."';");
	}
	$test6=mysqli_query($db_handle,"SELECT * FROM ListeAchat WHERE Achat='".$liste['Id']."';");
	if(mysqli_num_rows($test6)!=0){
		$temp=mysqli_query($db_handle,"DELETE FROM ListeAchat WHERE Achat='".$liste['Id']."';");
	}
	$test7=mysqli_query($db_handle,"SELECT Id FROM Enchere WHERE Objet='".$liste['Id']."';");
	if(mysqli_num_rows($test7)!=0){
		$id_enchere=mysqli_fetch_assoc($test7);
		$test71=mysqli_query($db_handle,"SELECT * FROM ListeEnchere WHERE Referance='".$id_enchere['Id']."';");
		if(mysqli_num_rows($test71)!=0)
		{
			$temp=mysqli_query($db_handle,"DELETE FROM ListeEnchere WHERE Referance='".$id_enchere['Id']."';");
		}
		$temp=mysqli_query($db_handle,"DELETE FROM Enchere WHERE Objet='".$liste['Id']."';");
	}
	$test=mysqli_query($db_handle,"DELETE FROM Objet WHERE Id='".$liste['Id']."';");
}
$test8=mysqli_query($db_handle,"SELECT * FROM Acheteur WHERE Personne='".$id."';");
if(mysqli_num_rows($test8)!=0)
{
	$test=mysqli_query($db_handle,"DELETE FROM Acheteur WHERE Personne='".$id."';");
}
$test9=mysqli_query($db_handle,"SELECT * FROM Vendeur WHERE Personne='".$id."';");
if(mysqli_num_rows($test9)!=0)
{
	$test=mysqli_query($db_handle,"DELETE FROM Vendeur WHERE Personne='".$id."';");
}
$test=mysqli_query($db_handle,"DELETE FROM HistoVendeur WHERE Personne='".$id."';");
$cb=mysqli_query($db_handle,"SELECT Carte FROM Personne WHERE Id'".$_SESSION['Id']."';");
$valcb=mysqli_fetch_assoc($cb);
$test=mysqli_query($db_handle,"DELETE FROM Personne WHERE Id='".$id."';");
$test=mysqli_query($db_handle,"DELETE FROM CB WHERE Id='".$valcb['Carte']."';");
header("Location:Admin.php");
?>
