<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 9:14
 */
include 'Template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div id="login-container" class="container w-50 rounded ">
    <h1>Registreren</h1>
    </br>
    <form action="Home.php" method="post">
        <div class="form-group">
            <label>Voornaam:</label>
            <input class="form-control" type="text" name="firstname"><br>
            <label>Achternaam:</label>
            <input class="form-control" type="text" name="lastname"><br>
            <label>Gebruikersnaam:</label>
            <input class="form-control" type="text" name="username"><br>
            <label>Adres:</label>
            <input class="form-control" type="text" name="address1"><br>
            <label>Adres-2:</label>
            <input class="form-control" type="text" name="address2"><br>
            <label>Postcode:</label>
            <input class="form-control" type="text" name="postalcode"><br>
            <label>Plaats:</label>
            <input class="form-control" type="text" name="city"><br>
            <label>Land:</label>
            <select class="form-control" name="country">
                <?php foreach ($array as $key){?>
                    <option><?php echo $option ?></option>
                <?php } ?>
            </select><br>
            <label>Geboortedatum:</label>
            <input class="form-control" type="text" name="date"><br>
            <label>Mail:</label>
            <input class="form-control" type="text" name="mail"><br>
            <label>Wachtwoord:</label>
            <input class="form-control" type="password" name="password"><br>
            <label>Wachtwoord-herhalen:</label>
            <input class="form-control" type="password" name="password_h"><br>
            <label>Beveiligingsvraag:</label>
            <select class="form-control" name="security_q">
                <?php foreach ($array as $key){?>
                    <option><?php echo $option ?></option>
                <?php } ?>
            </select><br>
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Registreer</button>
    </form>
</div>
<?php include 'Footer.php'?>
</body>
</html>
