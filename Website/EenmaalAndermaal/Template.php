<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 23-4-2018
 * Time: 9:58
 */
// Eventuele includes/ requires.
// Eventuele sessions/ cookies.
session_start();
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Normal CSS -->
    <link rel="stylesheet" type="text/css" href="css/Template.css">
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
                <a class="navbar-brand" href="index.php">EenmaalAndermaal <span class="sr-only">(current)</span></a>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Login.php">Profiel</a>
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
    <li class="breadcrumb-item active" aria-current="page"><a href="#">home</a></li>
    <?php
    foreach($crumbs as $crumb){
        echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
    }
    ?>
</ol>
</nav>
<?php
echo "<pre>";// zorgt dat 't goed leesbaar is
    print_r($_SESSION);// laat de hele sessie op dat moment zien
echo "</pre>";?>
</body>
</html>
