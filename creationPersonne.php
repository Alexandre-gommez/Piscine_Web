<?php
//inclure la requette de connexion a la bdd
 include 'loginBDD.php';
//recuperation des données 
 $nom=isset($_POST["nom"]) ? $_POST["nom"]:"";
 $prenom=isset($_POST["prenom"]) ? $_POST["prenom"]:"";
 $mail=isset($_POST["mail"]) ? $_POST["mail"]:"";
 $Ntel=isset($_POST["ntel"]) ? $_POST["ntel"]:"";
 $mdp=isset($_POST["mdp"]) ? $_POST["mdp"]:"";
 $adresse1=isset($_POST["adresse1"]) ? $_POST["adresse1"]:"";
 $adresse2=isset($_POST["adresse2"]) ? $_POST["adresse2"]:"";
 $ville=isset($_POST["ville"]) ? $_POST["ville"]:"";
 $codePostal=isset($_POST["codePostal"]) ? $_POST["codePostal"]:"";
 $Pays=isset($_POST["Pays"]) ? $_POST["Pays"]:"";
 $NomCB=isset($_POST["NomCB"]) ? $_POST["NomCB"]:"";
 $NCarte=isset($_POST["NCarte"]) ? $_POST["NCarte"]:"";
 $crypto=isset($_POST["crypto"]) ? $_POST["crypto"]:"";
 $typecarte=isset($_POST["typecarte"]) ? $_POST["typecarte"]:"";
 $date=isset($_POST["date"]) ? $_POST["date"]:"";

	//Creation CB
 mysqli_query($db_handle,"INSERT INTO CB(Nom_carte, Num, Crypto, Date_Expiration, Mdp, adresse1, adresse2, ville, CodePostal, Pays) VALUES("'.$nom.'","'.$prenom.'","'.$mail.'","'.$Ntel.'","'.$mdp.'","'.$adresse1.'",'.$adresse2.'","'.$ville.'","'.$codePostal.'","'.$Pays.');");

	//creation de la personne 
 mysqli_query($db_handle,"INSERT INTO Personne(Nom, Prenom, Mail, NumTel, Mdp, adresse1, adresse2, ville, CodePostal, Pays) VALUES("'.$nom.'","'.$prenom.'","'.$mail.'","'.$Ntel.'","'.$mdp.'","'.$adresse1.'",'.$adresse2.'","'.$ville.'","'.$codePostal.'","'.$Pays.');");

$idPersonne=mysqli_query($db_handle,"SELECT MAX(id) FROM CB");



?>
