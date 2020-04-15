<?php
//inclure la requette de connexion a la bdd
include 'loginBDD.php';
//recuperation des données 
$nom=isset($_POST["nom"]) ? $_POST["nom"]:"";
$prenom=isset($_POST["prenom"]) ? $_POST["prenom"]:"";
$mail=isset($_POST["email"]) ? $_POST["email"]:"";
$Ntel=isset($_POST["ntel"]) ? $_POST["ntel"]:"";
$mdp=isset($_POST["Password1"]) ? $_POST["Password1"]:"";
$adresse1=isset($_POST["adress1"]) ? $_POST["adress1"]:"";
$adresse2=isset($_POST["adress2"]) ? $_POST["adress2"]:"";
$ville=isset($_POST["ville"]) ? $_POST["ville"]:"";
$codePostal=isset($_POST["cp"]) ? $_POST["cp"]:"";
$Pays=isset($_POST["pays"]) ? $_POST["pays"]:"";
$NomCB=isset($_POST["proprio"]) ? $_POST["proprio"]:"";
$NCarte=isset($_POST["number1"]) ? $_POST["number1"]:"";
$crypto=isset($_POST["cvv"]) ? $_POST["cvv"]:"";
$typecarte=isset($_POST["type"]) ? $_POST["type"]:"";
$date=isset($_POST["date"]) ? $_POST["date"]:"";
$Role=isset($_POST["role"]) ? $_POST["role"]:"";
$username=isset($_POST["username"]) ? $_POST["username"]:"";

	//Creation CB
mysqli_query($db_handle,"INSERT INTO CB(Solde, Nom_carte, Num, Crypto, Type, Date_expiration) VALUES('100','".$NomCB."','".$NCarte."','".$crypto."','".$typecarte."','".$date."');");

$tempcb=mysqli_query($db_handle,"SELECT MAX(id) FROM CB");
$CB=mysqli_fetch_assoc($tempcb);
$idCB=$CB['MAX(id)'];

	//creation de la personne 
mysqli_query($db_handle,"INSERT INTO Personne(Nom, Prenom, Mail, NumTel, Mdp, adresse1, adresse2, ville, CodePostal, Pays, Carte, username) VALUES('".$nom."','".$prenom."','".$mail."','".$Ntel."','".$mdp."','".$adresse1."','".$adresse2."','".$ville."','".$codePostal."','".$Pays."','".$idCB."','".$username."');");

$tempp=mysqli_query($db_handle,"SELECT MAX(id) FROM Personne");
$Personne=mysqli_fetch_assoc($tempp);
$idPersonne=$Personne['MAX(id)'];

if ($Role==1) {
	mysqli_query($db_handle,"INSERT INTO Vendeur(Personne) VALUES('".$idPersonne."');");
} else if ($Role==2){
	mysqli_query($db_handle,"INSERT INTO Acheteur(Personne) VALUES('".$idPersonne."');");
}

mysqli_close($db_handle);
header("Location:index.php");
?>
