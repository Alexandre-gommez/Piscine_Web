<?php
//connexionau a la bdd
$db_handle = mysqli_connect('localhost', 'root', '');

//test de connexion
if ($db_handle -> connect_errno){
	echo "Echec connexion";
	exit();
}
//on se place dans la base ECEY
$db_found=mysqli_select_db($db_handle,'ecey');
//test de placement
if(!$db_found){
	echo "Problemes";
}
?>