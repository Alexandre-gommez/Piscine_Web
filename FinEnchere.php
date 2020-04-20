<?php

//inclure la requette de connexion a la bdd
include 'loginBDD.php';
//recuperation des données
// $id_enchere=$_GET['ID']; //récupérer l'ID de l'enchere
// $offre=isset($_POST["offre"]) ? $_POST["offre"]:"";
	//creation de l'enchère 
$req1=mysqli_query($db_handle,"SELECT SUBSTRING(Fin, 1, 2) FROM Enchere WHERE Id='1';"); //jour
$req2=mysqli_query($db_handle,"SELECT SUBSTRING(Fin, 4, 2) FROM Enchere WHERE Id='1';"); //mois
$req3=mysqli_query($db_handle,"SELECT SUBSTRING(Fin, 7, 2) FROM Enchere WHERE Id='1';"); //année
$req4=mysqli_query($db_handle,"SELECT SUBSTRING(Fin, 10, 2) FROM Enchere WHERE Id='1';"); //heure
$req5=mysqli_query($db_handle,"SELECT SUBSTRING(Fin, 13, 2) FROM Enchere WHERE Id='1';"); //minutes

$jour = mysqli_fetch_assoc($req1);
$mois = mysqli_fetch_assoc($req2);
$annee = mysqli_fetch_assoc($req3);
$heure = mysqli_fetch_assoc($req4);
$minutes = mysqli_fetch_assoc($req5);

date_default_timezone_set("Europe/Paris"); //dire que le time() est en FRance

if(time() > mktime(11,14,0,04,20,2020)){
    echo 'testV';
}

//La date limite est finie
if(time() > mktime($heure['SUBSTRING(Fin, 10, 2)'],$minutes['SUBSTRING(Fin, 13, 2)'],0,$mois['SUBSTRING(Fin, 4, 2)'],$jour['SUBSTRING(Fin, 1, 2)'],2020)){
    $req=mysqli_query($db_handle,"SELECT * FROM ListeEnchere WHERE Referance='1' ORDER BY Offre DESC"); 
}

?>