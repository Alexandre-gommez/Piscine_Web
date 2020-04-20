<?php

//inclure la requette de connexion a la bdd
include 'loginBDD.php';
//recuperation des données
$id_enchere=$_GET['ID']; //récupérer l'ID de l'enchere
$offre=isset($_POST["offre"]) ? $_POST["offre"]:"";


	//creation de l'enchère 
mysqli_query($db_handle,"INSERT INTO ListeEnchere(Referance, Personne, Offre) VALUES('".$id_enchere."','".$_SESSION['Id']."','".$offre."')");
?>