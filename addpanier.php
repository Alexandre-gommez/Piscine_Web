<?php
include "loginBDD.php";
$id=$_GET['ID'];
$type=$_GET['type'];
$test=mysqli_query($db_handle,"INSERT INTO ListeAchat(Achat,Client,typevente) VALUES('".$id."','".$_SESSION['Id']."','".$adresse[1]."')");
header("Location:Frontaffichage.php");
?>