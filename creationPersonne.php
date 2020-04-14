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
 $type=isset($_POST["type"]) ? $_POST["type"]:"";

	//Creation CB
 mysqli_query($db_handle,"INSERT INTO CB(Solde, Nom_carte, Num, Crypto, Type, Date_expiration) VALUES('100','".$NomCB."','".$NCarte."','".$crypto."','".$typecarte."','".$date."');");

$tempcb=mysqli_query($db_handle,"SELECT MAX(id) FROM CB");
$CB=mysqli_fetch_assoc($tempcb);
$idCB=$CB['MAX(id)'];

	//creation de la personne 
 mysqli_query($db_handle,"INSERT INTO Personne(Nom, Prenom, Mail, NumTel, Mdp, adresse1, adresse2, ville, CodePostal, Pays, Carte) VALUES('".$nom."','".$prenom."','".$mail."','".$Ntel."','".$mdp."','".$adresse1."','".$adresse2."','".$ville."','".$codePostal."','".$Pays."','".$idPersonne."');");

$tempp=mysqli_query($db_handle,"SELECT MAX(id) FROM Personne");
$Personne=mysqli_fetch_assoc($tempp);
$idPersonne=$Personne['MAX(id)'];

if ($type=="Vendeur") {
	mysqli_query($db_handle,"INSERT INTO Vendeur(Personne) VALUES('".$idPersonne."');")
} else if ($type=="Acheteur"){
	mysqli_query($db_handle,"INSERT INTO Acheteur(Personne) VALUES('".$idPersonne."');")
}

mysqli_close($db_handle);
?>
