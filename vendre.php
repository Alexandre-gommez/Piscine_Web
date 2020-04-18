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

    <!-- Pour template de w3school-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- --------------- -->


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
        a {
            text-decoration: none;
            color: black;
        }

        a:link {
            text-decoration: none !important;
            color: black;
        }

        a:hover {
            opacity: 30%;
        }

        .cropping {
            overflow: hidden;
            width: auto;
            height: 300px;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
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
                <li class="nav-item"><a class="nav-link" href="vendre.php">Vendre</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Acheter</a></li>
                <li class="nav-item"><a class="nav-link" href="compte.php">Mon compte</a></li>
                <li class="nav-item"><a class="nav-link" id="nav7" href="deconnexion.php">Deconnexion</a></li>
            </ul>
        </div>
    </nav>

    <br />
    <div class="container-fluid ">

        <div class="container">
            <button id="ajouter" type="button" class="btn btn-light btn-lg btn-block">+ Ajouter un article</button>
            <div id="form1">
                <form class="needs-validation">
                    <div class="card text-center shadow p-3 mb-5" style="background-color: rgb(250, 250, 250);">
                        <h3 class="card-title">Ajouter un produit</h3>
                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                    <span id="nom_manquant"></span>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="type">Catégorie</label>
                                    <select class="custom-select mr-sm-2" id="type" name="type" required>
                                        <option selected></option>
                                        <option value="1">Musée</option>
                                        <option value="2">VIP</option>
                                        <option value="3">Feraille</option>
                                    </select>
                                    <span id="type_manquant"></span>
                                </div>
                                <div class="form-group col-md-3 mx-auto">
                                    <div>
                                        <label for="images">5 images maximum</label>
                                        <input type="file" name="images" id="images" accept=".jpg,.jpeg,.png" multiple>
                                        <span id="image_manquant"></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mx-auto">
                                    <div>
                                        <label for="video">1 vidéo maximum</label>
                                        <input type="file" name="video" id="video" accept=".mov,.mp4,.avi">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="desciption" required>
                                    <span id="description_manquant"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="checkbox-group" required>
                                    <div class="form-check form-check-inline ml-5 mr-5">
                                        <input type="checkbox" class="custom-control-input" id="Achat">
                                        <label class="custom-control-label" for="Achat">Achat</label>
                                    </div>
                                    <div class="form-check form-check-inline mr-5">
                                        <input type="checkbox" class="custom-control-input" id="Offre">
                                        <label class="custom-control-label" for="Offre">Offre</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="custom-control-input" id="Enchere">
                                        <label class="custom-control-label" for="Enchere">Enchere</label>
                                    </div>
                                </div>
                                <span id="vente_manquant"></span>
                            </div>

                            <div class="row justify-content-md-center">
                                <div class="form-group col-md-3">
                                    <div id="prix1">
                                        <label for="Pachat">Prix pour à l'achat</label>
                                        <input type="text" class="form-control" id="Pachat" name="Pachat" placeholder=" en €" required>

                                        <span id="pa_manquant"></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div id="prix2">
                                        <label for="Penchere">Prix pour à l'enchère</label>
                                        <input type="text" class="form-control" id="Penchere" name="Penchere" placeholder=" en €" required>
                                        <span id="pe_manquant"></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div id="prix3">
                                        <label for="Pnego">Prix de base de négociation</label>
                                        <input type="text" class="form-control" id="Pnego" name="Pnego" placeholder=" en €" required>

                                        <span id="pn_manquant"></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div id="datelim">
                                        <label for="Plimit">Date limite de l'enchère</label>
                                        <input type="text" class="form-control" id="Plimit" name="Plimit" placeholder="JJ/MM/AAAA" required>
                                        <span id="pl_manquant"></span>
                                    </div>
                                </div>
                            </div>
                            <input onclick="location.href='vendre.php'" type="button" value="Retour" class="btn btn-secondary" id="retour"></input>
                            <button type="submit" class="btn btn-primary" id="valid"> Valider </button>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <!--Articles-->
            <br>
            <div class="row">
                <div class="col-sm-6 mb-5">
                    <div class="card">

                        <a data-toggle="modal" href="#myModal">
                            <div class="cropping">
                                <img src="image1.jpeg" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Nom objet</h5>
                                <p style="color:black" class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <span class="font-weight-bold">Prix</span>
                            <a href="#">
                                <img class="float-right" style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <a data-toggle="modal" href="#myModal">
                            <div class="cropping">
                                <img src="image2.jpeg" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Nom objet</h5>
                                <p style="color:black" class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <span class="font-weight-bold">Prix</span>
                            <a href="#">
                                <img class="float-right" style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-5">
                    <div class="card">

                        <a data-toggle="modal" href="#myModal">
                            <div class="cropping">
                                <img src="image3.jpeg" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Nom objet</h5>
                                <p style="color:black" class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <span class="font-weight-bold">Prix</span>
                            <a href="#">
                                <img class="float-right" style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <a data-toggle="modal" href="#myModal">
                            <div class="cropping">
                                <img src="image4.jpeg" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Nom objet</h5>
                                <p style="color:black" class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <span class="font-weight-bold">Prix</span>
                            <a href="#">
                                <img class="float-right" style="width : 45px; height :24px;" id="logo" src="backspace-solid.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="portfolio-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl"></div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="modal-body">
                                        <!-- Détail du modal-->
                                        <h2 class="text-uppercase">Nom de l'objet</h2> <!-- uppercase ça veut dire MAJ-->

                                        <!-- caroussel-->
                                        <div id="demo" class="carousel slide" data-ride="carousel">

                                            <!-- Indicators -->
                                            <ul class="carousel-indicators">
                                                <li data-target="#demo" data-slide-to="0" class="active"></li> <!-- Autant qu'il y a de photos -->
                                                <li data-target="#demo" data-slide-to="1"></li>
                                                <li data-target="#demo" data-slide-to="2"></li>
                                            </ul>

                                            <!-- Mettre les images -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="image1.jpeg" alt="image1" width="1100" height="500">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="image2.jpeg" alt="image2" width="1100" height="500">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="image3.jpeg" alt="image3" width="1100" height="500">
                                                </div>
                                            </div>

                                            <!-- controles gauche-droite du caroussel -->
                                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </a>
                                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </a>
                                        </div>
                                        <br />
                                        <p>Mettre la description de l'objet ici</p>
                                        <p>Mettre le type de vente</p>
                                        <hr />
                                        <p class="font-weight-bold">Prix</p>

                                        <button class="btn btn-primary" data-dismiss="modal" type="button">Close Project</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br />
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
            if (img.files.length > 5) {
                alert("5 images Maximum");
                img.preventDefault();
            }
        }
    </script>

</body>