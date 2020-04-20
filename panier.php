<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>ECEY</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Arapey&display=swap" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <script>
      document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="css/landing-page.min.css" rel="stylesheet">
  <script type="text/javascript" src="scripts.js"></script>
  <script>
    $(document).ready(function() {
        $('.header').height($(window).height());
    });
</script>
<style>
    a{
        text-decoration: none;
        color:black;
    }
    a:link{
        text-decoration: none!important;
        color:black;
    }
    a:hover{
        opacity:30%;
    }
    .cropping{
        overflow:hidden;
        width:auto;
        height:300px;
    }
</style>
</head>

<body class="fade-in">

    <nav class="navbar navbar-expand-md shadow">
        <a class="navbar-brand" href="index.php">
            <img id="logo" src="logo.png" alt="">
        </a>
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="FrontAffichage.php">Acheter</a></li>
                <li class="nav-item"><a class="nav-link" href="compte.php">Mon compte</a></li>
                <li class="nav-item"><a class="nav-link" id="nav7" href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row justify-content-center">
                <button type="button" onclick="location.href='payement.php'" class="btn btn-secondary"> Payer </button>
        </div>
    </div>

    <div class="container-fluid ">
        <div class="container">
        <hr>
            <?php
            echo "<div class=\"container-fluid \">";
            echo "<div class=\"container\">" ;
            $db_handle = mysqli_connect('localhost', 'root', 'root');

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
            $cmpt=0;
            $Listeobj=mysqli_query($db_handle,"SELECT * FROM ListeAchat WHERE Client='".$_SESSION['Id']."'");
            while($tab_panier=mysqli_fetch_assoc($Listeobj))
            {
                if($cmpt%2==0)
                {
                    echo '<div class="row">';
                }
                
                if($tab_panier['typevente']==2){
                    $type=2;
                    $tab_objet_temp=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$tab_panier['Achat']."';");
                    $tab_objet=mysqli_fetch_assoc($tab_objet_temp);
                    $test7=mysqli_query($db_handle,"SELECT * FROM Enchere WHERE Objet='".$tab_panier['Achat']."';");
                    $id_enchere=mysqli_fetch_assoc($test7);
                    $prix=$id_enchere['Prix'];
                    $date=$id_enchere['Fin'];
                    $test71=mysqli_query($db_handle,"SELECT * FROM ListeEnchere WHERE Referance='".$id_enchere['Id']."';");
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
                    if($type==1){
                        echo '<span class="font-weight-bold">Achat -> Prix : '.$prix.'$</span>';
                    }else if($type==2){
                        echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
                    }else if($type==3){
                        echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
                    }
                    echo "\n";
                    echo '<a href="DeletObjet.php?ID='.$tab_objet['Id'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
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
                    if($tab_objet['Image2']=='0'){
                        $cmpt2=1;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                    }
                    else if($tab_objet['Image3']=='0'){
                        $cmpt2=2;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                    }
                    else if($tab_objet['Image4']=='0'){
                        $cmpt2=3;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                        echo '<li data-target="#demo" data-slide-to="2"></li>';
                    }
                    else {
                        $cmpt2=4;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                        echo '<li data-target="#demo" data-slide-to="2"></li>';
                        echo '<li data-target="#demo" data-slide-to="3"></li>';
                    }
                    echo '</ul>';
                    echo '<div class="carousel-inner">';
                    if($tab_objet['Image2']=='0'){
                        echo '<div class="carousel-item active">';
                        echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
                        echo '</div>';
                    }
                    else if($tab_objet['Image3']=='0'){
                        echo '<div class="carousel-item active">';
                        echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
                        echo '</div>';
                        echo '<div class="carousel-item">';
                        echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
                        echo '</div>';
                    }
                    else if($tab_objet['Image4']=='0'){
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
                    else {
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
                    echo '</div>';
                    echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
                    echo '<span class="carousel-control-prev-icon"></span>';
                    echo '</a>';
                    echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
                    echo '<span class="carousel-control-next-icon"></span>';
                    echo '</a>';
                    echo '</div>';
                    if($tab_objet['Video']!=0){
                        echo '<div class="embed-responsive embed-responsive-4by3">';
                        echo '<iframe class="embed-responsive-item" src="'.$tab_objet['Video'].'"></iframe>';
                        echo '</div>';
                    }
                    echo '<br />';
                    echo '<p>'.$tab_objet['Description'].'</p>';
                    if($type==1){
                        echo '<p>Prix de vente direct </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                    }else if($type==2){
                        echo '<p>Prix de vente de depart </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                    }else if($type==3){
                        echo '<p>Prix de vente de depart </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                        echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
                    }
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
                if($tab_panier['typevente']==1){
                    $type=1;
                    $tab_objet_temp=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$tab_panier['Achat']."';");
                    $tab_objet=mysqli_fetch_assoc($tab_objet_temp);
                    $test1=mysqli_query($db_handle,"SELECT * FROM Achat WHERE Objet='".$tab_panier['Achat']."';");
                    $temp_prix=mysqli_fetch_assoc($test1);
                    $prix=$temp_prix['Prix'];
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
                    if($type==1){
                        echo '<span class="font-weight-bold">Achat -> Prix : '.$prix.'$</span>';
                    }else if($type==2){
                        echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
                    }else if($type==3){
                        echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
                    }
                    echo "\n";
                    echo '<a href="DeletObjet.php?ID='.$tab_objet['Id'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
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
                    if($tab_objet['Image2']=='0'){
                        $cmpt2=1;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                    }
                    else if($tab_objet['Image3']=='0'){
                        $cmpt2=2;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                    }
                    else if($tab_objet['Image4']=='0'){
                        $cmpt2=3;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                        echo '<li data-target="#demo" data-slide-to="2"></li>';
                    }
                    else {
                        $cmpt2=4;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                        echo '<li data-target="#demo" data-slide-to="2"></li>';
                        echo '<li data-target="#demo" data-slide-to="3"></li>';
                    }
                    echo '</ul>';
                    echo '<div class="carousel-inner">';
                    if($tab_objet['Image2']=='0'){
                        echo '<div class="carousel-item active">';
                        echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
                        echo '</div>';
                    }
                    else if($tab_objet['Image3']=='0'){
                        echo '<div class="carousel-item active">';
                        echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
                        echo '</div>';
                        echo '<div class="carousel-item">';
                        echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
                        echo '</div>';
                    }
                    else if($tab_objet['Image4']=='0'){
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
                    else {
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
                    echo '</div>';
                    echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
                    echo '<span class="carousel-control-prev-icon"></span>';
                    echo '</a>';
                    echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
                    echo '<span class="carousel-control-next-icon"></span>';
                    echo '</a>';
                    echo '</div>';
                    if($tab_objet['Video']!=0){
                        echo '<div class="embed-responsive embed-responsive-4by3">';
                        echo '<iframe class="embed-responsive-item" src="'.$tab_objet['Video'].'"></iframe>';
                        echo '</div>';
                    }
                    echo '<br />';
                    echo '<p>'.$tab_objet['Description'].'</p>';
                    if($type==1){
                        echo '<p>Prix de vente direct </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                    }else if($type==2){
                        echo '<p>Prix de vente de depart </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                    }else if($type==3){
                        echo '<p>Prix de vente de depart </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                        echo '<p class="font-weight-bold">Date de fin '.$date.'</p>';
                    }
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
                if($tab_panier['typevente']==3){
                    $type=3;
                    $tab_objet_temp=mysqli_query($db_handle,"SELECT * FROM Objet WHERE Id='".$tab_panier['Achat']."';");
                    $tab_objet=mysqli_fetch_assoc($tab_objet_temp);
                    $test4=mysqli_query($db_handle,"SELECT * FROM Offre WHERE Objet='".$tab_panier['Achat']."';");
                    $id_offre=mysqli_fetch_assoc($test4);
                    $prix=$id_offre['Prix'];
                    $test41=mysqli_query($db_handle,"SELECT * FROM ListeOffres WHERE Referance='".$id_offre['Id']."';");
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
                    if($type==1){
                        echo '<span class="font-weight-bold">Achat -> Prix : '.$prix.'$</span>';
                    }else if($type==2){
                        echo '<span class="font-weight-bold">Enchere -> Prix : '.$prix.'$</span>';
                    }else if($type==3){
                        echo '<span class="font-weight-bold">A Negocier -> Prix : '.$prix.'$</span>';
                    }
                    echo "\n";
                    echo '<a href="DeletObjet.php?ID='.$tab_objet['Id'].'"><img class="float-right"style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt=""></a>';
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
                    if($tab_objet['Image2']=='0'){
                        $cmpt2=1;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                    }
                    else if($tab_objet['Image3']=='0'){
                        $cmpt2=2;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                    }
                    else if($tab_objet['Image4']=='0'){
                        $cmpt2=3;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                        echo '<li data-target="#demo" data-slide-to="2"></li>';
                    }
                    else {
                        $cmpt2=4;
                        echo '<li data-target="#demo" data-slide-to="0" class="active"></li> ';
                        echo '<li data-target="#demo" data-slide-to="1"></li>';
                        echo '<li data-target="#demo" data-slide-to="2"></li>';
                        echo '<li data-target="#demo" data-slide-to="3"></li>';
                    }
                    echo '</ul>';
                    echo '<div class="carousel-inner">';
                    if($tab_objet['Image2']=='0'){
                        echo '<div class="carousel-item active">';
                        echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
                        echo '</div>';
                    }
                    else if($tab_objet['Image3']=='0'){
                        echo '<div class="carousel-item active">';
                        echo '<img src="'.$tab_objet['Image1'].'" alt="image1" width="1100" height="500">';
                        echo '</div>';
                        echo '<div class="carousel-item">';
                        echo '<img src="'.$tab_objet['Image2'].'" alt="image2" width="1100" height="500">';
                        echo '</div>';
                    }
                    else if($tab_objet['Image4']=='0'){
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
                    else {
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
                    echo '</div>';
                    echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">';
                    echo '<span class="carousel-control-prev-icon"></span>';
                    echo '</a>';
                    echo '<a class="carousel-control-next" href="#demo" data-slide="next">';
                    echo '<span class="carousel-control-next-icon"></span>';
                    echo '</a>';
                    echo '</div>';
                    if($tab_objet['Video']!=0){
                        echo '<div class="embed-responsive embed-responsive-4by3">';
                        echo '<iframe class="embed-responsive-item" src="'.$tab_objet['Video'].'"></iframe>';
                        echo '</div>';
                    }
                    echo '<br />';
                    echo '<p>'.$tab_objet['Description'].'</p>';
                    if($type==1){
                        echo '<p>Prix de vente direct </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                    }else if($type==3){
                        echo '<p>Prix de vente de depart </p>';
                        echo '<hr />';
                        echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                        echo '<table class="table table-dark">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">Offre</th>';
                        echo '<th scope="col">1</th>';
                        echo '<th scope="col">2</th>';
                        echo '<th scope="col">3</th>';
                        echo '<th scope="col">4</th>';
                        echo '<th scope="col">5</th>';
                        echo '<th scope="col">proposition</th>';
                        echo '<th scope="col">Valider</th>';
                        echo '</tr>';
                        echo '</thead>';
                        $listeoffre=mysqli_query($db_handle,"SELECT * FROM ListeOffres WHERE Personne='".$_SESSION['Id']."' AND Referance='".$tab_objet['Id']."';");
                        $ligne=mysqli_fetch_assoc($listeoffre);
                        echo '<tbody>';
                        echo '<tr>';
                        echo '<p>Test</p>';
                        echo '<td>Offre</td>';
                        echo '<td>'.$ligne['Offre1'].'</td>';
                        echo '<td>'.$ligne['Offre2'].'</td>';
                        echo '<td>'.$ligne['Offre3'].'</td>';
                        echo '<td>'.$ligne['Offre4'].'</td>';
                        echo '<td>'.$ligne['Offre5'].'</td>';
                        if ($ligne['Offre1']=='0'||$ligne['Offre3']=='0'||$ligne['Offre5']!='0')
                        {
                            echo '<td>';
                            echo '<form>';
                            echo '<div class="form-row">';
                            echo '<div class="form-group col-md-6">';
                            echo '<input type="text" class="form-control" id="number" name="number">';
                            echo '<span class="text_manquant"></span>';
                            echo '</div>';

                            echo '<div class="form-group col-md-6">';
                            echo '<input onclick="location.href=\'offre.php\'?Personne='.$_SESSION['Id'].'&Id='.$tab_objet['Id'].'" type="button" value="Valider" class="btn btn-secondary">';

                    //
                    //echo '<input type="submit" value="Valider" class="btn btn-secondary" id="btn"'$i'  name="btn"'$i'>';
                            echo '</div>';
                            echo '</div>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                            echo '</tr>';
                            echo '</tbody>'; 
                            echo '</table>';
                        }else if($type==2){
                            echo '<p>Prix de vente de depart </p>';
                            echo '<hr />';
                            echo '<p class="font-weight-bold">Prix de base'.$prix.'</p>';
                        }
                        echo '<button class="btn btn-primary" data-dismiss="modal" type="button">Fermer</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
            if($cmpt%2==0)
            {
                echo '</div>';
            }
            echo "</div>";
            

            ?>
         
            </div>
        </div>
           
    </div>
    <script>
        var valid = document.getElementById("valid");

        var ajout = document.getElementById("ajouter");
        var form = document.getElementById("form1");

        var achat = document.getElementById("Achat");
        var offre = document.getElementById("Offre");
        var enchere = document.getElementById("Enchere");

        var prix1 = document.getElementById("prix1");
        var prix2 = document.getElementById("prix2");
        var prix3 = document.getElementById("prix3");
        var datelim = document.getElementById("datelim");

        var nom = document.getElementById("nom");
        var nmanquant = document.getElementById("nom_manquant");
        var type = document.getElementById("type");
        var typemanquant = document.getElementById("type_manquant");
        var desc = document.getElementById("description");
        var dmanquant = document.getElementById("description_manquant");
        var vmanquant = document.getElementById("vente_manquant");
        var pachat = document.getElementById("Pachat");
        var pamanquant = document.getElementById("pa_manquant");
        var pnego = document.getElementById("Pnego");
        var pnmanquant = document.getElementById("pn_manquant");
        var penchere = document.getElementById("Penchere");
        var pemanquant = document.getElementById("pe_manquant");
        var plimit = document.getElementById("Plimit");
        var plmanquant = document.getElementById("pl_manquant");
        var img = document.getElementById("images");
        var imanquant = document.getElementById("image_manquant");

        var btn = [];
        var text = [];
        var tmanquant = [];


        btn= document.getElementById("btn");
        text= document.getElementById("number");
        btn.onclick(function(){
            if(number.validity.valueMissing)
            {

                tmanquant.textContent = "Entrez un prix";
                tmanquant.style.color = 'red';
                tmanquant.style.display = 'block';
            }
            else{

            }
        });

        form.style.display = 'none';

        prix1.style.display = 'none';
        prix2.style.display = 'none';
        prix3.style.display = 'none';
        datelim.style.display = 'none';

        img.addEventListener('input', filesNb);

        valid.addEventListener('click', validation);

        ajout.addEventListener('click', open);

        achat.addEventListener('change', function() {
            if (this.checked) {
                prix1.style.display = 'block';
            } else {
                prix1.style.display = 'none';
            }
        });
        enchere.addEventListener('change', function() {
            if (this.checked) {
                prix2.style.display = 'block';
                datelim.style.display = 'block';
            } else {
                prix2.style.display = 'none';
                datelim.style.display = 'none';
            }
        });
        offre.addEventListener('change', function() {
            if (this.checked) {
                prix3.style.display = 'block';
            } else {
                prix3.style.display = 'none';
            }
        });

        function open() {
            form.style.display = 'block';
            ajout.style.display = 'none';
        }

        function validation(res) {
            var i = 0;
            if (achat.checked) {
                i++;
                pachat.required = true;
            } else {
                pachat.required = false;
            }
            if (enchere.checked) {
                i++;
                penchere.required = true;
                plimit.required = true;
            } else {
                penchere.required = false;
                plimit.required = false;
            }
            if (offre.checked) {
                i++;
                pnego.required = true;
            } else {
                pnego.required = false;
            }

            if (enchere.checked && offre.checked) {
                res.preventDefault();
                vmanquant.textContent = "Enchère et offre ne sont pas compatibles";
                vmanquant.style.color = 'red';
                vmanquant.style.display = 'block';
            } else {
                vmanquant.style.display = 'none';
            }
            if (achat.checked && pachat.validity.valueMissing) {
                res.preventDefault();
                pamanquant.textContent = "Entrez un prix";
                pamanquant.style.color = 'red';
                pamanquant.style.display = 'block';
            } else {
                pamanquant.style.display = 'none';
            }
            if (enchere.checked && penchere.validity.valueMissing) {
                res.preventDefault();
                pemanquant.textContent = "Entrez un prix";
                pemanquant.style.color = 'red';
                pemanquant.style.display = 'block';
            } else {
                pemanquant.style.display = 'none';
            }
            if (enchere.checked && plimit.validity.valueMissing) {
                res.preventDefault();
                plmanquant.textContent = "Entrez une date limite";
                plmanquant.style.color = 'red';
                plmanquant.style.display = 'block';
            } else {
                plmanquant.style.display = 'none';
            }
            if (offre.checked && pnego.validity.valueMissing) {
                res.preventDefault();
                pnmanquant.textContent = "Entrez un prix";
                pnmanquant.style.color = 'red';
                pnmanquant.style.display = 'block';
            } else {
                pnmanquant.style.display = 'none';
            }
            if (nom.validity.valueMissing) {
                res.preventDefault();
                nmanquant.textContent = "Entrez le nom de l'article";
                nmanquant.style.color = 'red';
                nmanquant.style.display = 'block';
            } else {
                nmanquant.style.display = 'none';
            }

            if (type.validity.valueMissing) {
                res.preventDefault();
                typemanquant.textContent = "Entrez la catégorie";
                typemanquant.style.color = 'red';
                typemanquant.style.display = 'block';
            } else {
                typemanquant.style.display = 'none';
            }
            if (desc.validity.valueMissing) {
                res.preventDefault();
                dmanquant.textContent = "Entrez la description";
                dmanquant.style.color = 'red';
                dmanquant.style.display = 'block';
            } else {
                dmanquant.style.display = 'none';
            }
            if (i == 0) {
                res.preventDefault();
                vmanquant.textContent = "Selectionnez au moins une case";
                vmanquant.style.color = 'red';
                vmanquant.style.display = 'block';
            }
            if (img.files.length < 1) {
                res.preventDefault();
                imanquant.textContent = "Selectionnez au moins une image";
                imanquant.style.color = 'red';
                imanquant.style.display = 'block';
                img.preventDefault();
            } else if (img.files.length > 5) {
                res.preventDefault();
                imanquant.textContent = "Selectionnez maximum 5 images";
                imanquant.style.color = 'red';
                imanquant.style.display = 'block';
                img.preventDefault();
            } else {
                imanquant.style.display = 'none';
            }
        }

        function filesNb() {
            if (img.files.length > 4) {
                alert("4 images Maximum");
                img.preventDefault();
            }
        }

    </script>
</body>
</html>