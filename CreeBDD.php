<?php 
	//connexionau a la bdd
$db_handle = mysqli_connect('localhost', 'root','');
	//test de connexion
if ($db_handle -> connect_errno){
	echo "Echec connexion";
	exit();
}

	//on supprime pour eviter tout doublon 
mysqli_query($db_handle,"DROP DATABASE IF EXISTS ecey;");
	// On cree la bdd
mysqli_query($db_handle,"CREATE DATABASE ecey DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;");

	// se place dans la table
$db_found = mysqli_select_db($db_handle, "ecey");
	//on ouvre le fichier contenant les requettes
$data=fopen('BDD.sql','r');

if(!$data){
	echo "lecture des données impossible";
	exit();
}else {
	//tant que le fichier n'est pas fini on execute ligne par ligne les commandes dans la base de donnée
	while(!feof($data)){
		//lecture ligne par ligne
		$requete=fgets($data);
		echo $requete;
		echo "<br>";
		//execution de la requette 
		mysqli_query($db_handle,$requete);
	}
	echo "BDD crée";
}
?>