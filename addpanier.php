<?php
include "loginBDD.php";
$id=$_GET['ID'];
$type=$_GET['type'];
$test=mysqli_query($db_handle,"INSERT INTO ListeAchat(Achat,Client,typevente) VALUES('".$id."','".$_SESSION['Id']."','".$type."')");
if($type==3)
{
    $test=mysqli_query($db_handle,"INSERT INTO ListeOffres(Referance,Personne,Offre1,Offre2,Offre3,Offre4,Offre5) VALUES('".$id."','".$_SESSION['Id']."','0','0','0','0','0')");
}
if($type==2)
{
$test=mysqli_query($db_handle,"INSERT INTO ListeEnchere(Referance,Personne,Offre) VALUES('".$id."','".$_SESSION['Id']."','0')");
}
header("Location:FrontAffichage.php");
?>