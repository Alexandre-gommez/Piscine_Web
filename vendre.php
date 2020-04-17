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


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="css/landing-page.min.css" rel="stylesheet">
    <script type="text/javascript" src="scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('.header').height($(window).height());
        });
    </script>

</head>

<body class="fade-in">

    <nav class="navbar navbar-expand-md shadow">
        <a class="navbar-brand" href="index.html">
            <img id="logo" src="logo.png" alt="">
        </a>
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Vendre</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Acheter</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Mon compte</a></li>
            </ul>
        </div>
    </nav>

    <!--Template afficher article
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">First item</a>
  <a href="#" class="list-group-item list-group-item-action">Second item</a>
  <a href="#" class="list-group-item list-group-item-action">Third item</a>
</div>-->
    <br />
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <a class="list-group-item list-group-item-action">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm text-center">
                                Nom objet
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm text-center"><img style="width : 100%; height :100%;" src="image1.jpeg" class="img-rounded" alt="test"></div>
                            <div class="col-sm text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between">
                            <div class="col-sm">
                                <span class="font-weight-bold">Prix</span>
                            </div>
                            <div class="col-sm align-self-end text-right">
                                <img style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">image</div>
                            <div class="col-sm">description</div>
                        </div>

                        <div class="row">
                            <div class="col-sm"></div>
                            <div class="col-sm">
                                <p class="font-weight-bold">Prix</p>
                            </div>
                        </div>
                    </div>

                </a>
            </div>
            <img style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">
        </div>
    </div>

</body>