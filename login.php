<?php

include 'loginBDD.php';

$id=isset($_POST["username"]) ? $_POST["username"]:"";
$mdp=isset($_POST["password"]) ? $_POST["password"]:"";

$test=mysqli_query($db_handle,"SELECT Id FROM Personne WHERE username ='".$id . "' AND Mdp ='" .$mdp ."'");
$Personne=mysqli_fetch_assoc($test);
$_SESSION['Id']=$Personne['Id'];

$admin=mysqli_query($db_handle,"SELECT * FROM Admin  WHERE Personne = '".$_SESSION['Id']."'");
$acheteur=mysqli_query($db_handle,"SELECT * FROM Acheteur  WHERE Personne = '".$_SESSION['Id']."'");
$vendeur=mysqli_query($db_handle,"SELECT * FROM Vendeur  WHERE Personne = '".$_SESSION['Id']."'");
if (isset($admin)){
	$_SESSION['role']=3;
}else if (isset($acheteur)){
	$_SESSION['role']=1;
}else if (isset($vendeur)){
	$_SESSION['role']=2;
}else{
	$_SESSION['role']=0;
}
header("Location:index.php");
?>