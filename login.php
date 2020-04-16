<?php

include 'loginBDD.php';

$id=isset($_POST["username"]) ? $_POST["username"]:"";
$mdp=isset($_POST["password"]) ? $_POST["password"]:"";

$test=mysqli_query($db_handle,"SELECT Id FROM Personne WHERE username ='".$id . "' AND Mdp ='" .$mdp ."'");
$Personne=mysqli_fetch_assoc($test);
$_SESSION['Id']=$Personne['Id'];

$admin=mysqli_query($db_handle,"SELECT Personne FROM Admin  WHERE Personne = '".$_SESSION['Id']."'");
$acheteur=mysqli_query($db_handle,"SELECT Personne FROM Acheteur  WHERE Personne = '".$_SESSION['Id']."'");
$vendeur=mysqli_query($db_handle,"SELECT Personne FROM Vendeur  WHERE Personne = '".$_SESSION['Id']."'");
if (mysqli_num_rows($admin)==0&&mysqli_num_rows($acheteur)==0&&mysqli_num_rows($vendeur)==0){
	$_SESSION['role']=0;
}else if (mysqli_num_rows($admin)==1&&mysqli_num_rows($acheteur)==0&&mysqli_num_rows($vendeur)==0){
	$_SESSION['role']=3;
}else if (mysqli_num_rows($admin)==0&&mysqli_num_rows($acheteur)==0&&mysqli_num_rows($vendeur)==1){
	$_SESSION['role']=2;
}else if (mysqli_num_rows($admin)==0&&mysqli_num_rows($acheteur)==1&&mysqli_num_rows($vendeur)==0){
	$_SESSION['role']=1;
}

header("Location:index.php");
?>