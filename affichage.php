<?php
include 'loginBDD.php';             
$cmpt=0;
$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";
//include 'FrontAffichage.php';
echo "<div class=\"container-fluid \">";
echo "<div class=\"container\">" ;
if ($categorie==1&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$test=0;
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
			$test=1;
			$prix_enchere==mysqli_fetch_assoc($prix_enchere_temp);
			echo '<span class="font-weight-bold">Prix de l\'enchere : '.$prix_enchere['Offre'].'</span>';
		}
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'&type"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
else if ($categorie==1&&$vente==2){
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'&type=3"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=3"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=3"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=3"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=3"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=3"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=1"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Achat direct</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix '.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=2"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>Enchere</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de depart '.$prix.'</p>';
		if ($test==1)
		{
			echo '<p class="font-weight-bold">Prix actuel '.$Prixatm.'</p>';
		}
		else 
		{
			echo '<p class="font-weight-bold">pas d\'enchere</p>';
		}
		echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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
		echo '<div class="col-sm-6 mb-5">';
		echo "\n";
		echo '<div class="card">';
		echo "\n";
		echo "<a data-toggle=\"modal\" href=\"#myModal".$cmpt."\">";
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
		if($_SESSION['role']==1)
		{
			echo '<a href="addpanier.php?ID='.$liste1['Objet'].'&type=3"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="310522.svg" alt=""></a>';
		}
		if($_SESSION['role']==3)
		{
			echo '<a href="DeletObjet.php?ID='.$liste1['Objet'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
		}
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		echo '</div>';
		echo "\n";
		$cmpt2=0;
		echo '<div class="portfolio-modal modal fade" id="myModal'.$cmpt.'" tabindex="-1" role="dialog" aria-hidden="true">';
		echo '<div class="modal-dialog modal-xl">';
		echo '<div class="modal-content">';
		echo '<div class="close-modal" data-dismiss="modal">';
		echo '<div class="lr">';
		echo '<div class="rl"></div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col-lg-8 mx-auto">';
		echo '<div class="modal-body">';
		echo '<!-- Détail du modal-->';
		echo '<h2 class="text-uppercase">'.$tab_objet['Nom'].'</h2>';
		echo '<div id="demo" class="carousel slide" data-ride="carousel">';
		echo '<ul class="carousel-indicators">';
		if($tab_objet['Image2']==0){
			$cmpt2=1;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
		}
		else if($tab_objet['Image3']==0){
			$cmpt2=2;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
		}
		else if($tab_objet['Image4']==0){
			$cmpt2=3;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
		}
		else if($tab_objet['Image5']==0){
			$cmpt2=4;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
		}
		else if($tab_objet['Image5']!=0){
			$cmpt2=5;
			echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
			echo '<li data-target="#demo" data-slide-to="1"></li>';
			echo '<li data-target="#demo" data-slide-to="2"></li>';
			echo '<li data-target="#demo" data-slide-to="3"></li>';
			echo '<li data-target="#demo" data-slide-to="4"></li>';
		}
		echo '</ul>';
		echo '<div class="carousel-inner">';
		if($cmpt2==1){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==2){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==3){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==4){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		else if($cmpt2==5){
			echo '<div class="carousel-item active">';
			echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image3'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image4'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
			echo '<div class="carousel-item">';
			echo '<img src="'.$tab_objet['Image5'].'" alt="image2" width="1100" height="500">';
			echo '</div>';
		}
		echo '</div>';
		echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
		echo '<span class="carousel-control-prev-icon"></span>';
		echo '</a>';
		echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
		echo '<span class="carousel-control-next-icon"></span>';
		echo '</a>';
		echo '</div>';
		echo '<br />';
		echo '<p>'.$tab_objet['Description'].'</p>';
		echo '<p>A negocier</p>';
		echo '<hr />';
		echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
		//faire une offre puis ajouter au panier
		echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
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