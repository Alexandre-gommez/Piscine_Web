<?php
include "loginBDD.php";

$boucle=mysqli_query($db_handle,"SELECT * FROM Histovendeur");
while($liste=mysqli_fetch_assoc($boucle))
{
	
}
?>