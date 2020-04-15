<?php

include 'loginBDD.php';

$id=isset($_POST["username"]) ? $_POST["username"]:"";
$mdp=isset($_POST["password"]) ? $_POST["password"]:"";

$test=mysqli_query($db_handle,"SELECT Id FROM Personne WHERE username ='".$id . "' AND Mdp ='" .$mdp ."'");
$Personne=mysqli_fetch_assoc($test);
$_SESSION['Id']=$Personne['Id'];

$test=mysqli_query($db_handle,"SELECT * FROM Admin  WHERE Personne = '".$_SESSION['Id']."'");
if (isset($test)){
	$_SESSION['role']=3;
}
$test=mysqli_query($db_handle,"SELECT * FROM Acheteur  WHERE Personne = '".$_SESSION['Id']."'");
if (isset($test)){
	$_SESSION['role']=1;
}
$test=mysqli_query($db_handle,"SELECT * FROM Vendeur  WHERE Personne = '".$_SESSION['Id']."'");
if (isset($test)){
	$_SESSION['role']=2;
}else{
	$_SESSION['role']=0;
}
echo $_SESSION['role'];
?>