<?php

//inclure la requette de connexion a la bdd
include 'loginBDD.php';
//recuperation des données 
$nom=isset($_POST["nom"]) ? $_POST["nom"]:"";
$description=isset($_POST["desciption"]) ? $_POST["desciption"]:"";
$type=isset($_POST["type"]) ? $_POST["type"]:"";
$video=isset($_FILES["video"]) ? $_FILES["video"]:"0";
$_SESSION['Id'];

$countfiles = count($_FILES['images']['name']);
if(isset($_FILES['images']))
{
	// Looping all files
	for($i=0;$i<$countfiles;$i++){
		$filename = $_FILES['images']['name'][$i];
		$adresse[$i+1]=$filename;
  		// Upload file
		move_uploaded_file($_FILES['images']['tmp_name'][$i], '../Piscine_Web/' . basename($_FILES['images']['name'][$i]));
	}
}

if(isset($_FILES['video'])&&$_FILES['video']['error'] == 0)
{
	$filename = $_FILES['video']['name'];
	move_uploaded_file($_FILES['video']['tmp_name'], '../Piscine_Web/' . basename($_FILES['video']['name']));
}
else 
{
	$filename=0;
}

if($countfiles==1){
	$adresse[2]=0;
	$adresse[3]=0;
	$adresse[4]=0;
}else if($countfiles==2){
	$adresse[3]=0;
	$adresse[4]=0;	
}else if($countfiles==3){
	$adresse[4]=0;
}

	//creation de l'objet 
mysqli_query($db_handle,"INSERT INTO Objet(Nom, Description, Image1, Image2, Image3, Image4, Video, Vendeur) VALUES('".$nom."','".$description."','".$adresse[1]."','".$adresse[2]."','".$adresse[3]."','".$adresse[4]."','".$filename."','".$_SESSION['Id']."');");

$temp=mysqli_query($db_handle,"SELECT MAX(id) FROM Objet");
$Objet=mysqli_fetch_assoc($temp);
$idObjet=$Objet['MAX(id)'];

if($type==1){
	mysqli_query($db_handle,"INSERT INTO Musee(Objet) VALUES('".$idObjet."');");
}else if($type==2){
	mysqli_query($db_handle,"INSERT INTO VIP(Objet) VALUES('".$idObjet."');");
}else if($type==3){
	mysqli_query($db_handle,"INSERT INTO Ferraille(Objet) VALUES('".$idObjet."');");
}

if(isset($_POST["Achat"]))
{
	$prixachat=isset($_POST["Pachat"]) ? $_POST["Pachat"]:"";
	mysqli_query($db_handle,"INSERT INTO Achat(Objet,Prix) VALUES('".$idObjet."','".$prixachat."');");
}
if(isset($_POST["Offre"]))
{
	$prixoffre=isset($_POST["Pnego"]) ? $_POST["Pnego"]:"";
	mysqli_query($db_handle,"INSERT INTO Offre(Objet,Prix) VALUES('".$idObjet."','".$prixoffre."');");
}
if(isset($_POST["Enchere"]))
{
	$prixenchere=isset($_POST["Penchere"]) ? $_POST["Penchere"]:"";
	$dateenchere=isset($_POST["Plimit"]) ? $_POST["Plimit"]:"";
	mysqli_query($db_handle,"INSERT INTO Enchere(Objet,Fin,Prix) VALUES('".$idObjet."','".$dateenchere."','".$prixenchere."');");
}

mysqli_close($db_handle);
//header("Location:vendre.php");
?>