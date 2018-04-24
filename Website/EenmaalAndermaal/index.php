<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 24-4-2018
 * Time: 11:15
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Normal CSS -->
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<body class="text-white bg-dark">
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="#">EenmaalAndermaal <span class="sr-only">(current)</span></a>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profiel</a>
                    <a class="dropdown-item" href="#">Mijn veilingen</a>
                    <a class="dropdown-item" href="#">Boden</a>
                    <a class="dropdown-item" href="#">Artikelen</a>
                    <a class="dropdown-item" href="#">Gevolgde veilingen</a>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Veilingen
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Overzicht</a>
                    <a class="dropdown-item" href="#">Nieuwe veiling</a>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Beheer
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Veilingen</a>
                    <a class="dropdown-item" href="#">Gebruikers</a>
                    <a class="dropdown-item" href="#">Prestatie</a>
                    <a class="dropdown-item" href="#">Batch upload</a>
                </div>
            </li>
        </ul>
        <nav aria-label="breadcrumb">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Iets zoeken" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Zoek</button>
            </form>
        </nav>
    </div>
</nav>
<nav class="...">
    <ol id="Breadcrumb" class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Home > </a></li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-6">
        <div id="demo" class="carousel slide" data-ride="carousel" style="width: 600px; margin: 0 auto">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/la.jpg" alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="image/chicago.jpg" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="image/ny.jpg" alt="New York">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>


    <div id="text-container" class="container w-50 h-50 rounded">
            <h1>Over ons</h1>
        <img width="290" height="220" src="image/Geekcrew.jpg" class="float-right"" />

        <p>EenmaalAndermaal is een veilingsite van iConcepts die kopers en verkopers samenbrengt om prettig en veilig te handelen.
            Iedereen kan een advertentie plaatsen of producten verkopen. Het enige wat je nodig hebt is een email adres
            en een paar minuten van je tijd. Deze website was opgericht in 2018 door een team van getraumatiseerde studenten.
            Wij hopen u hierbij veel koop plezier te leveren.</p>

    </div>
</div>
<?php include 'Footer.php'?>

</body>
</html>

