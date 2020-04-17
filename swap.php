<?php 

include 'loginBDD.php';

if ($_SESSION['role']==1){
	$_SESSION['role']=2;
	$temp=mysqli_query($db_handle,"DELETE FROM Acheteur WHERE Personne='".$_SESSION['Id']."';");
	$temp=mysqli_query($db_handle,"INSERT INTO Vendeur(personne) VALUES ('".$_SESSION['Id']."');");
	$test=mysqli_query($db_handle,"SELECT * FROM Histovendeur WHERE Personne='".$_SESSION['Id']."';");
	if(mysqli_num_rows($test)==0){
			$test=mysqli_query($db_handle,"INSERT INTO Histovendeur(personne) VALUES ('".$_SESSION['Id']."');");
	}
}else if ($_SESSION['role']==2){
	$_SESSION['role']=1;
	$test=mysqli_query($db_handle,"DELETE FROM Vendeur WHERE Personne='".$_SESSION['Id']."';");
	$test=mysqli_query($db_handle,"INSERT INTO Acheteur(personne) VALUES ('".$_SESSION['Id']."');");
}
header("Location:compte.php");
?>