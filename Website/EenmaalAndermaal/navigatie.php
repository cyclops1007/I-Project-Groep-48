<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 18-5-2018
 * Time: 10:36
 */
$profiel = "";
$profielN = "";
if(isset($_POST['search']) && !empty($_POST['search'])){
    $_SESSION['zoek'] = $_POST['search'];
    header("veilingen_overzicht.php");
}

if($_SESSION['rol'] == 0 || !isset($_SESSION['rol'])){
    $profiel = "login.php";
    $profielN = "Login";
}else{
    $ingelogd = ingelogd($_SESSION['ID']);
    $profiel = "mijn_account.php";
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
                <?php if($_SESSION['rol'] == 0 || !isset($_SESSION['rol'])){ ?>
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="registreer.php">Registreer</a>
                <?php }else{  ?>
                    <a class="dropdown-item" href="uitloggen.php">Uitloggen</a>
                    <a class="dropdown-item" href="mijn_account.php">Profiel</a>
                    <a class="dropdown-item" href="mijn_artikelen.php">Mijn biedingen</a>
                    <a class="dropdown-item" href="account_upgrade.php">Account upgraden</a>
                    <?php if($_SESSION['rol'] >= 2){?>
                        <a class="dropdown-item" href="mijn_artikelen.php">Mijn veilingen</a>
                    <?php }} ?>
            </div>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Veilingen
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="veilingen_overzicht.php">Overzicht</a>
                <?php if($_SESSION['rol'] >= 2 ){ ?>
                    <a class="dropdown-item" href="voorwerp_verkoop.php">Nieuwe veiling</a>
                <?php } ?>
            </div>
        </li>
        <?php if($_SESSION["rol"] == 3){?>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Beheer
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin_voorwerp.php">Veilingen</a>
                    <a class="dropdown-item" href="admin_gebruiker.php">Gebruikers</a>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div style="margin-right: 1%;">
        <?php
            if($_SESSION['rol'] != 0 && isset($_SESSION['rol'])) {
                echo "U bent ingelogd als: " . $ingelogd[0]['gebruikersnaam'];
            }
        ?>
    </div>
    <nav aria-label="breadcrumb">
        <form class="form-inline my-2 my-lg-0" action="veiling.php" method="post">
            <input class="form-control mr-sm-2" type="text" name="search" />
            <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Submit" />
        </form>
    </nav>
</div>
</html>
