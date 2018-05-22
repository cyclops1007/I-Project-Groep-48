<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 9:14
 */

include 'Template.php';
if(isset($_SESSION['Rol'])){header("Index.php");}
//$options = getOptions();
if (!empty($_POST)){

    $required = array('firstname', 'lastname', 'username', 'address1', 'postalcode', 'city', 'country', 'date', 'mail', 'password', 'password_h', 'security_q');

    $error = false;
    $verified = false;
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }

    if ($error) {
        echo "All fields are required.";
    } else {
        $firstname      = $_POST['firstname'];
        $lastname       = $_POST['lastname'];
        $username       = $_POST['username'];
        $address1       = $_POST['address1'];
        $address2       = $_POST['address2'];
        $postalcode     = $_POST['postalcode'];
        $city           = $_POST['city'];
        $country        = $_POST['country'];
        $date           = $_POST['date'];
        $mail           = $_POST['mail'];
        $password       = $_POST['password'];
        $security_q     = $_POST['security_q'];

        registreer($_POST);
        $verified = true;
        echo "Form verstuurd";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div id="login-container" class="container w-50 rounded ">
    <h1>Registreren</h1></br>
<?php
//if($verified){
//    echo "Uw account is aangemaakt, <br />  verifieer het door op de activatie link te klikken in je mail.";
//    $hash = md5( rand(0,1000) );
//    $sql = $dbh->query("INSERT INTO Gebruikers (gebruikersnaam, voornaam, achternaam, adresregel1,
//                                adresregel2, postcode, plaatsnaam, geboortedag, mailbox, wachtwoord,
//                                vraagnummer, antwoordTekst, Hash)
//                                VALUES ($username, $firstname, $lastname, $address1, $address2, $postalcode,
//                                $city, $date, $mail, $password, $security_q, $security_a, $hash)");
//    $sql->execute;
//}
?>
    <form action="" method="post">
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
                <?php //foreach ($options as $key) { ?>
                    <option><?php// echo $key ?></option>
                <?php //} ?>
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
                <?php //foreach ($array as $key) { ?>
                    <option><?php// echo $option
                        $security_a = "";
                        ?></option>
                <?php //} ?>
            </select><br>
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Registreer</button>
    </form>
</div>
<?php include 'Footer.php';?>
</body>
</html>
