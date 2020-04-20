<?php
include "loginBDD.php";
$key=$_GET['key'];
$i=$_GET['i'];
$prix=isset($_POST['number'$i]) ? $_POST['number'$i]:"";
if(isset($key)&&isset($i))
{
	$ligne=mysqli_query($db_handle,"SELECT * FROM ListeOffres WHERE Id=".$key.";");
	$tab=mysqli_fetch_assoc($ligne);
	if ($tab['Offre2']==0)
	{
		if ($tab['Offre1']==$prix)
		{
			$test=mysqli_query($db_handle,"UPDATE ListeOffre SET acheter='".$prix."' WHERE Id = '".$key."';");
		}
		else 
		{
			$test=mysqli_query($db_handle,"UPDATE ListeOffre SET Offre2='".$prix."' WHERE Id = '".$key."';");
		}	
	}
	if ($tab['Offre4']==0)
	{
		if ($tab['Offre3']==$prix)
		{
			$test=mysqli_query($db_handle,"UPDATE ListeOffre SET acheter='".$prix."' WHERE Id = '".$key."';");
		}
		else 
		{
			$test=mysqli_query($db_handle,"UPDATE ListeOffre SET Offre4='".$prix."' WHERE Id = '".$key."';");
		}	
	}
	if ($tab['Offre5']!=0)
	{
		if ($tab['Offre5']==$prix)
		{
			$test=mysqli_query($db_handle,"UPDATE ListeOffre SET acheter='".$prix."' WHERE Id = '".$key."';");
		}
		else 
		{
			$test=mysqli_query($db_handle,"UPDATE ListeOffre SET acheter='0' WHERE Id = '".$key."';");
		}	
	}
}
if
?>
