<?php
include 'loginBDD.php';             
$cmpt=0;
$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";
include 'FrontAffichage.php';
echo "<div class=\"container-fluid \">";
echo "<div class=\"container\">" ;
echo $categorie;
echo $vente;
echo '<div id="touttype">';
$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
while($liste1=mysqli_fetch_assoc($Enchere))
{
	if($cmpt%2==0)
	{
		echo '<div class="row">';
	}
	$date=$liste1['Fin'];
	$prix=$liste1['Prix'];
	$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
	$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
	$tab_objet=mysqli_fetch_assoc($objet);
	echo '<div class="col-sm-6 mb-5">';
	echo "\n";
	echo '<div class="card">';
	echo "\n";
	echo "<a data-toggle=\"modal\" href=\"#myModal\">";
	echo "<div class=\"cropping\">";
	echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
	echo "</div>";
	echo "\n";
	echo '<div class="card-body">';
	echo "\n";
	echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
	echo "\n";
	echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</a>';
	echo "\n";
	echo '<div class="card-footer">';
	echo "\n";
	echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
	echo "\n";
	if(mysqli_num_rows($prix_enchere_temp)>1)
	{
		$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
		echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
	}
	if($_SESSION['role']==3)
	{
		echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
	}
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</div>';
	echo "\n";
	if($cmpt%2==1)
	{
		echo '</div>';
		echo "\n";
	}
	$cmpt++;
}
$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
while($liste1=mysqli_fetch_assoc($Achat))
{
	if($cmpt%2==0)
	{
		echo '<div class="row">';
	}
	$prix=$liste1['Prix'];
	$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
	$tab_objet=mysqli_fetch_assoc($objet);
	echo '<div class="col-sm-6 mb-5">';
	echo "\n";
	echo '<div class="card">';
	echo "\n";
	echo "<a data-toggle=\"modal\" href=\"#myModal\">";
	echo "<div class=\"cropping\">";
	echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
	echo "</div>";
	echo "\n";
	echo '<div class="card-body">';
	echo "\n";
	echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
	echo "\n";
	echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</a>';
	echo "\n";
	echo '<div class="card-footer">';
	echo "\n";
	echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
	echo "\n";
	if($_SESSION['role']==3)
	{
		echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
	}
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</div>';
	echo "\n";
	if($cmpt%2==1)
	{
		echo '</div>';
	}
	$cmpt++;
}
$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
while($liste1=mysqli_fetch_assoc($Offre))
{
	if($cmpt%2==0)
	{
		echo '<div class="row">';
	}
	$prix=$liste1['Prix'];
	$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
	$tab_objet=mysqli_fetch_assoc($objet);
	echo '<div class="col-sm-6 mb-5">';
	echo "\n";
	echo '<div class="card">';
	echo "\n";
	echo "<a data-toggle=\"modal\" href=\"#myModal\">";
	echo "<div class=\"cropping\">";
	echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
	echo "</div>";
	echo "\n";
	echo '<div class="card-body">';
	echo "\n";
	echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
	echo "\n";
	echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</a>';
	echo "\n";
	echo '<div class="card-footer">';
	echo "\n";
	echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
	echo "\n";
	if($_SESSION['role']==3)
	{
		echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
	}
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</div>';
	echo "\n";
	echo '</div>';
	echo "\n";
	if($cmpt%2==1)
	{
		echo '</div>';
	}
	$cmpt++;
}
if($cmpt%2==0)
{
	echo '</div>';
}
$cmpt=0;
echo'</div>';
if ($categorie==1&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==1&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
		echo "\n";
		if(mysqli_num_rows($prix_enchere_temp)>1){
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==1&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==2&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
		echo "\n";
		if(mysqli_num_rows($prix_enchere_temp)>1){
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==2&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==2&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
		echo "\n";
		if(mysqli_num_rows($prix_enchere_temp)>1){
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==2&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==3&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
		echo "\n";
		if(mysqli_num_rows($prix_enchere_temp)>1){
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==3&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==3&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
		echo "\n";
		if(mysqli_num_rows($prix_enchere_temp)>1){
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==3&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==4&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
		echo "\n";
		if(mysqli_num_rows($prix_enchere_temp)>1){
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\">';
			echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==4&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Achat Direct -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==4&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere_temp=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$liste1['Id']."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
		echo "\n";
		if(mysqli_num_rows($prix_enchere_temp)>1){
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
else if ($categorie==4&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		if($cmpt%2==0)
		{
			echo '<div class="row">';
		}
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal\">";
		echo "<div class=\"cropping\">";
		echo '<img src="'.$tab_objet['Image1'].'" class="card-img-top">';
		echo "</div>";
		echo "\n";
		echo '<div class="card-body">';
		echo "\n";
		echo '<h5 class="card-title text-center">'.$tab_objet['Nom'].'</h5>';
		echo "\n";
		echo '<p class="card-text">'.$tab_objet['Description'].'</p>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</a>';
		echo "\n";
		echo '<div class="card-footer">';
		echo "\n";
		echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
		echo "\n";
		if($_SESSION['role']==3)
		{
			echo '<a href=\"DeletObjet.php?ID='.$liste1['Objet'].'\"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		if($cmpt%2==1)
		{
			echo '</div>';
		}
		$cmpt++;
	}
	if($cmpt%2==0)
	{
		echo '</div>';
	}
	$cmpt=0;
}
echo "</div>";
echo "</div>";
?>
