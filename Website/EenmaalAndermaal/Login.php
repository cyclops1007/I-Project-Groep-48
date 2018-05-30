<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 23-4-2018
 * Time: 15:27
 */
//if(isset($_SESSION['rol']) && $_SESSION['rol'] == "gast") {
ob_start();
include 'Template.php';
isGuest();
$login_foutmelding = "";
if (!empty($_POST))
{
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $login_foutmelding = '<p class="login">Niet alle velden zijn ingevuld!</p>';
        echo $login_foutmelding;
    } else {
        $login_query = $dbh->prepare("SELECT * FROM Gebruiker WHERE gebruikersnaam = :username AND wachtwoord = :password");
        $login_query->execute(
            array(
                'username' => $_POST["username"],
                'password' => $_POST["password"]
            )
        );
        $tellen = $login_query->rowCount();
        if ($tellen == 0) {
            $login_foutmelding = '<p class="login">De gebruikersnaam en wachtwoord komen niet overeen.</p>';
            echo $login_foutmelding;
        } else {
            $username = $_POST["username"];
            $_SESSION['ID'] = id($username);
            $_SESSION["Rol"] = rol($username);
            $_SESSION['username'] = $_POST['username'];
            header("Location: Mijn_account.php");
        }
        print_r($_POST);
    }
}
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
<?php include 'Footer.php';?>
</body>
</html>