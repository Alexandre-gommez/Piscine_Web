<?php
//inclure la requette de connexion a la bdd
include 'loginBDD.php';
//recuperation des données 
$nom=isset($_POST["nom"]) ? $_POST["nom"]:"";
$description=isset($_POST["description"]) ? $_POST["description"]:"";
$prix=isset($_POST["prix"]) ? $_POST["prix"]:"";
$type=isset($_POST["type"]) ? $_POST["type"]:"";
$typeAchatE=isset($_POST["typeAchatE"]) ? $_POST["typeAchatE"]:"";
$typeAchatA=isset($_POST["typeAchatA"]) ? $_POST["typeAchatA"]:"";
$typeAchatM=isset($_POST["typeAchatM"]) ? $_POST["typeAchatM"]:"";

	//creation de la personne 
mysqli_query($db_handle,"INSERT INTO Personne(Nom, Prenom, Mail, NumTel, Mdp, adresse1, adresse2, ville, CodePostal, Pays, Carte) VALUES('".$nom."','".$prenom."','".$mail."','".$Ntel."','".$mdp."','".$adresse1."','".$adresse2."','".$ville."','".$codePostal."','".$Pays."','".$idPersonne."');");

$temp=mysqli_query($db_handle,"SELECT MAX(id) FROM Objet");
$Objet=mysqli_fetch_assoc($temp);
$idObjet=$Objet['MAX(id)'];

if($type=="Musée"){
	mysqli_query($db_handle,"INSERT INTO Musee(Objet) VALUES('".$idObjet."');");
}else if($type=="VIP"){
	mysqli_query($db_handle,"INSERT INTO VIP(Objet) VALUES('".$idObjet."');");
}else if($type=="Ferraille"){
	mysqli_query($db_handle,"INSERT INTO Ferraille(Objet) VALUES('".$idObjet."');");
}

if($type=="Musée"){
	mysqli_query($db_handle,"INSERT INTO Musee(Objet) VALUES('".$idObjet."');");
}
if($type=="VIP"){
	mysqli_query($db_handle,"INSERT INTO VIP(Objet) VALUES('".$idObjet."');");
}
if($type=="Ferraille"){
	mysqli_query($db_handle,"INSERT INTO Ferraille(Objet) VALUES('".$idObjet."');");
}

mysqli_close($db_handle);
?>