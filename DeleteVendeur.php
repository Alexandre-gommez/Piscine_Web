<?php
include "loginBDD.php";
	$id=$_GET['ID'];
	$temp=mysqli_query($db_handle,"SELECT * FROM Object WHERE Vendeur='".$id."';");
	while($liste=mysqli_fetch_assoc($boucle))
	{
		
	}
?>