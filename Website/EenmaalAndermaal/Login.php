<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 23-4-2018
 * Time: 15:27
 */
//if(isset($_SESSION['rol']) && $_SESSION['rol'] == "gast") {
ob_start();
include 'template.php';
isGuest();
Login();
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div id="login-container" class="container w-50 rounded" style="padding-bottom: 1%;">
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
    <p>Nog geen account? Klik <a href="registreer.php">HIER</a> om te registreren!</p>
</div>
<?php include 'footer.php';?>
</body>
</html>