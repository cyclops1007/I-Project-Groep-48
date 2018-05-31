<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 18-5-2018
 * Time: 10:36
 */
$profiel = "";
$profielN = "";
if($_SESSION['rol'] == 0){
    $profiel = "Login.php";
    $profielN = "Login";
}else{
    $profiel = "Mijn_account.php";
    $profielN = "Mijn profiel";
}
?>
<!DOCTYPE html>
<html lang="en">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="navbar-brand" href="index.php">EenmaalAndermaal <span class="sr-only">(current)</span></a>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
            </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if($_SESSION['rol'] == 0 ){ ?>
                <a class="dropdown-item" href="Login.php">Login</a>
            <?php }else{ ?>
                <a class="dropdown-item" href="Mijn_account.php">Profiel</a>
                <a class="dropdown-item" href="#">Mijn boden</a>
                <a class="dropdown-item" href="#">Meldingen</a>
            <?php if($_SESSION['rol'] >= 2){?>
                <a class="dropdown-item" href="Mijn_artikelen.php">Mijn veilingen</a>
            <?php }} ?>
        </div>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Veilingen
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Veilingen_overzicht.php">Overzicht</a>
              <?php if($_SESSION['rol'] >= 2 ){ ?>
                  <a class="dropdown-item" href="Verkoop.php">Nieuwe veiling</a>
              <?php } ?>
            </div>
        </li>
        <?php if($_SESSION["rol"] == 3){?>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Beheer
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Veiling_Overzicht_Beheerder.php">Veilingen</a>
                <a class="dropdown-item" href="Admin_gebruiker.php">Gebruikers</a>
                <a class="dropdown-item" href="#">Prestatie</a>
                <a class="dropdown-item" href="Batch_upload.php">Batch upload</a>
            </div>
        </li>
        <?php } ?>
    </ul>
    <nav aria-label="breadcrumb">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Iets zoeken" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Zoek</button>
        </form>
    </nav>
</div>
</html>
