<?php

include 'loginBDD.php';

$categorie=isset($_POST["categorie"]) ? $_POST["categorie"]:"";
$vente=isset($_POST["vente"]) ? $_POST["vente"]:"";

if ($categorie==1&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==1&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==1&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==1&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==2&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==2&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==2&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==2&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM ferraille)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==3&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==3&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==3&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==3&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM Musee)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==4&&$vente==1){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==4&&$vente==2){
	$Achat=mysqli_query($db_handle,"SELECT * FROM Achat WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Achat))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==4&&$vente==3){
	$Enchere=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Enchere))
	{
		$date=$liste1['Fin'];
		$prix=$liste1['Prix'];
		$prix_enchere=mysqli_query($db_handle,"SELECT *,MAX(Offre) FROM ListeEnchere WHERE Referance='".$Id."';");
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}else if ($categorie==4&&$vente==4){
	$Offre=mysqli_query($db_handle,"SELECT * FROM Offre WHERE objet IN (SELECT objet FROM VIP)");
	while($liste1=mysqli_fetch_assoc($Offre))
	{
		$prix=$liste1['Prix'];
		$objet=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$liste1['Objet']."';");
		$tab_objet=mysqli_fetch_assoc($objet);
		echo '<div class="row">';
		echo '<div class="col-sm-6 mb-5">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<div class="col-sm-6">';
		echo '<div class="card">';
		echo '<img src="'.$tab_objet['Image1']'" class="card-img-top">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title text-center">Nom objet</h5>';
		echo '<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>';
		echo '</div>';
		echo '<div class="card-footer">';
		echo '<span class="font-weight-bold">Prix</span>';
		echo '<img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}
?>

