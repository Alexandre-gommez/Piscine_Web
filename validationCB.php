<?php

include 'loginBDD.php';

$id_obj=$_GET['ID']; //récupérer l'ID de l'objet
$NomCB=isset($_POST["proprio"]) ? $_POST["proprio"]:"";
$NCarte=isset($_POST["number1"]) ? $_POST["number1"]:"";
$crypto=isset($_POST["cvv"]) ? $_POST["cvv"]:"";
$typecarte=isset($_POST["type"]) ? $_POST["type"]:"";
$date=isset($_POST["date"]) ? $_POST["date"]:"";


$test=mysqli_query($db_handle,"SELECT Id FROM CB WHERE Nom_Carte ='".$NomCB. "' AND Num ='" .$NCarte."' AND Crypto ='" .$crypto."' AND Type ='" .$typecarte."' AND Date_Expiration ='" .$date."'");

if(isset($test)){
    $ID_Carte_Test=mysqli_fetch_assoc($test);
    $check=mysqli_query($db_handle,"SELECT Carte FROM Personne WHERE Id = '".$_SESSION['Id']."'");
    $ID_Carte_Personne=mysqli_fetch_assoc($check);
    if($ID_Carte_Test['Id']==$ID_Carte_Personne['Carte']){
        // ça marche, faut vérifier l'argent est dans le compte maintenant
    }
}
else{
    // Les valeurs données ne sont pas bonnes
}

?>