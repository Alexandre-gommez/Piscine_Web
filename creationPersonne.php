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

if(isset($_FILES['img']))
{
	$filename1 = $_FILES['img']['name'];
	move_uploaded_file($_FILES['img']['tmp_name'], '../Piscine_Web/' . basename($_FILES['img']['name']));
	echo "test";
}
else
{
	$filename1=0;
}

if(isset($_FILES['Test']))
{
	$filename2 = $_FILES['Test']['name'];
	move_uploaded_file($_FILES['Test']['tmp_name'], '../Piscine_Web/' . basename($_FILES['Test']['name']));
		echo "test1";
}
else
{
	$filename2="carreblanc.jpg";
}

if($_SESSION['role']==1||$_SESSION['role']==2||$_SESSION['role']==3)
{
	mysqli_query($db_handle,"UPDATE Personne SET nom = '".$nom."',Prenom ='".$prenom."',Mail='".$mail."',NumTel='".$Ntel."',Mdp='".$mdp."',adresse1='".$adresse1."',adresse2='".$adresse2."',ville='".$ville."',CodePostal='".$codePostal."',Pays='".$Pays."',username='".$username."',Image1='".$filename1."',Image2='".$filename2."' WHERE Id = '".$_SESSION['Id']."';");
	mysqli_close($db_handle);
	header("Location:compte.php");
}
else 
{
	//Creation CB
	mysqli_query($db_handle,"INSERT INTO CB(Solde, Nom_carte, Num, Crypto, Type, Date_expiration) VALUES('1000','".$NomCB."','".$NCarte."','".$crypto."','".$typecarte."','".$date."');");

	$tempcb=mysqli_query($db_handle,"SELECT MAX(id) FROM CB");
	$CB=mysqli_fetch_assoc($tempcb);
	$idCB=$CB['MAX(id)'];

	//creation de la personne 
	mysqli_query($db_handle,"INSERT INTO Personne(Nom, Prenom, Mail, NumTel, Mdp, adresse1, adresse2, ville, CodePostal, Pays, Carte, username,'avatar.jpg',Image2) VALUES('".$nom."','".$prenom."','".$mail."','".$Ntel."','".$mdp."','".$adresse1."','".$adresse2."','".$ville."','".$codePostal."','".$Pays."','".$idCB."','".$username."','avatar.jpg','".$filename2."');");

	$tempp=mysqli_query($db_handle,"SELECT MAX(id) FROM Personne");
	$Personne=mysqli_fetch_assoc($tempp);
	$idPersonne=$Personne['MAX(id)'];

	if ($Role==1) {
		mysqli_query($db_handle,"INSERT INTO Vendeur(Personne) VALUES('".$idPersonne."');");
		mysqli_query($db_handle,"INSERT INTO Histovendeur(Personne) VALUES('".$idPersonne."');");
	} else if ($Role==2){
		mysqli_query($db_handle,"INSERT INTO Acheteur(Personne) VALUES('".$idPersonne."');");
	}
	mysqli_close($db_handle);
	header("Location:index.php");
}
?>
