<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 23-4-2018
 * Time: 15:27
 */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> a3a9d423a06da059ae5dcfa2c05309c0c3d637da
//if(isset($_SESSION['rol']) && $_SESSION['rol'] == "gast") {
    include 'Template.php';

    $login_foutmelding = "";
if(isset($_POST['submit'])) // name of your submit button
{
<<<<<<< HEAD
        if (isset($_POST["username"]) || isset($_POST["password"])) {
=======
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $login_foutmelding = '<p class="login">Niet alle velden zijn ingevuld!</p>';
            echo $login_foutmelding;
        } else {
>>>>>>> a3a9d423a06da059ae5dcfa2c05309c0c3d637da
            $login_query = $dbh->prepare("SELECT * FROM Gebruiker WHERE gebruikersnaam = :username AND wachtwoord = :password");
            $login_query->execute(
                array(
                    'username' => $_POST["username"],
                    'password' => $_POST["password"]
                )
            );
<<<<<<< HEAD

            $tellen = $login_query->rowCount();
            if ($tellen == 0) {
                $login_foutmelding = '<p class="login">De gebruikersnaam en wachtwoord komen niet overeen.</p>';
                echo $login_foutmelding;
            } else {
                $_SESSION["username"] = $_POST["username"];
                header("Location: Mijn_account.php");
            }
        } else {
            $login_foutmelding = '<p class="login">Niet alle velden zijn ingevuld!</p>';
            echo $login_foutmelding;
        }
        print_r($_POST);
    }
=======
if(isset($_SESSION['rol']) && $_SESSION['rol'] == "gast"){
include 'Template.php';
>>>>>>> b900a1e6e54e6ed0505ffe3037de39e5b09bf15a
=======
            $tellen = $login_query->rowCount();
            if ($tellen != 0) {
                $_SESSION["username"] = $_POST["username"];
                header("Location: Mijn_account.php");
            } else {
                $login_foutmelding = '<p class="login">De gebruikersnaam en wachtwoord komen niet overeen.</p>';
                echo $login_foutmelding;
            }
        }
        print_r($_POST);
    }
>>>>>>> a3a9d423a06da059ae5dcfa2c05309c0c3d637da
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div id="login-container" class="container w-50 rounded ">
    <h1>Login</h1>
    <br>
    <form action="" method="post">
        <div class="form-group">
            <label>Gebruikersnaam:</label>
            <input class="form-control" type="text" name="username"><br>
            <label>Wachtwoord:</label>
            <input class="form-control" type="password" name="password"><br>
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Login</button>
    </form>
    <br>
    <p>Nog geen account? Klik <a href="Registreer.php">HIER</a> om te registreren!</p>
</div>
<?php
//include 'Footer.php';
//}else{
// header("Location: http://localhost/I-Project-Groep-48/Website/EenmaalAndermaal/index.php");
//}
?>
</body>
</html>
