<?php 

include 'loginBDD.php';

if ($_SESSION['role']==1){
	$_SESSION['role']=2;
	$test=mysqli_query($db_handle,"DELETE FROM Acheteur WHERE '".$_SESSION['id']."';");
	$test=mysqli_query($db_handle,"INSERT INTO Vendeur(personne) VALUES '".$_SESSION['id']."';");
}else if ($_SESSION['role']==2){
	$_SESSION['role']=1;
	$test=mysqli_query($db_handle,"DELETE FROM Vendeur WHERE '".$_SESSION['id']."';");
	$test=mysqli_query($db_handle,"INSERT INTO Acheteur(personne) VALUES '".$_SESSION['id']."';");
}