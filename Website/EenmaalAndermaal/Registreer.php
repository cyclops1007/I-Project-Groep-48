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

    $required = array('firstname', 'lastname', 'username', 'address1', 'postalcode', 'city', 'date', 'mail', 'password', 'password_h');

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
        //$country        = 1;
        $date           = $_POST['date'];
        $mailaddress     = $_POST['mail'];
        $password       = $_POST['password'];
        //$security_q     = "ff nog nikslolxd";

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $password_h = $_POST['password_h'];
        $isCorrect = password_verify($password_h, $hashed_password);

        if($isCorrect){
            registreer($_POST);
            require 'Testmailserver.php';
            $mail->AddAddress($mailaddress);
            $mail->SetFrom('eenmaalandermaal2018@gmail.com'); //send from
            $mail->Subject = "Signup | verification"; //title
            $mail->Body = "Thanks for signing up! . <br> .
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below. . <br> .
            
            ------------------------ . <br> .
            Username: . '' . $username . <br> . 
            Password: . '' . $password . <br> .
            ------------------------ . <br> .
         
            <a href='http://localhost/php/website/Website/EenmaalAndermaal/Geverifieerd.php?email=$mailaddress'>please click this link to activate your account</a>";

            $mail->isHTML(true);
            try{
                $mail->Send();
                echo "Je account is gemaakt! <br/> Klik op de activatie link op uw mail om uw account the verifiëren";

            } catch(Exception $e){
                // Something went bad
                echo $e;
            }


        }else{
            echo "Wachtwoord komt niet overeen";
        };
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
            <!--        <label>Land:</label>
            <select class="form-control" name="country">
                <?php //foreach ($options as $key) { ?>
                    <option><?php// echo $key ?></option>
                <?php //} ?>
            </select><br> -->
            <label>Geboortedatum:</label>
            <input class="form-control" type="text" name="date"><br>
            <label>Mail:</label>
            <input class="form-control" type="text" name="mail"><br>
            <label>Wachtwoord:</label>
            <input class="form-control" type="password" name="password"><br>
            <label>Wachtwoord-herhalen:</label>
            <input class="form-control" type="password" name="password_h"><br>
            <!--         <label>Beveiligingsvraag:</label>
           <select class="form-control" name="security_q">
                <?php //foreach ($array as $key) { ?>
                    <option name="security_a"><?php// echo $option

            ?></option>
                <?php //} ?>
            </select><br>-->
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Registreer</button>
    </form>
</div>
<?php include 'Footer.php';?>
</body>
</html>
