<?php

include 'loginBDD.php';

$id=isset($_POST["username"]) ? $_POST["username"]:"";
$mdp=isset($_POST["password"]) ? $_POST["password"]:"";

$test=mysqli_query($db_handle,"SELECT Id FROM Personne WHERE username ='".$id . "' AND Mdp ='" .$mdp ."'")
$Personne=mysqli_fetch_assoc($test);
$idPersonne=$Personne['id'];
echo $idPersonne;
?>