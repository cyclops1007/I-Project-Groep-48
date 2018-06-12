<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 9:14
 */

include 'template.php';
if(isset($_SESSION['rol'])){header("index.php");}
$options = getLanden();
$fnameerr = "";
$lnameerr = "";
$userr = "";
$adderr = "";
$posterr = "";
$dateerr = "";
$mailerr = "";
$passerr = "";
$passherr = "";
$user = "";
$mailer = "";

if (!empty($_POST)){

    $required = array('firstname', 'lastname', 'username', 'address1', 'postalcode', 'date', 'mail', 'password', 'password_h');

    $error = false;
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }
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

        $user = checkusername($username);
        $mailer = checkmail($mailaddress);
        $checkmail2 = checkmail($mailaddress);
        $checkuser2 = checkusername($username);
        if(empty($firstname)){$fnameerr = "Voornaam is niet ingevuld";}
        if(empty($lastname)){$lnameerr = "Achternaam is niet ingevuld";}
        if(empty($username)){$userr = "Gebruikersnaam is niet ingevuld";}
        if(empty($address1)){$adderr = "Adres is niet ingevuld";}
        if(empty($postalcode)){$posterr = "Postcode is niet ingevuld";}
        if(empty($date)){$dateerr = "Geboortedatum is niet ingevuld";}
        if(empty($mailaddress)){$mailerr = "Email is niet ingevuld";}
        if(empty($password)){$passerr = "wachtwoord is niet ingevuld";}
        if(empty($password_h)){$passherr = "wachtwoord is niet ingevuld";}

        if($isCorrect == true && $error == false && $checkuser2 == false && $checkmail2 == false){

            $hash = registreer($_POST);
            $subject = "Signup | verification"; //title
            $email = "Thanks for signing up! <br>
            Your account has been created, you can login with the following credential after you have activated your account by pressing the url below. <br>
            
            ------------------------ <br>
            Username: '' $username <br> 
            ------------------------ <br>
         
            <a href='http://iproject48.icasites.nl/geverifieerd.php?email=$mailaddress&hash=$hash'>please click this link to activate your account</a>";
            $to = $mailaddress;
            $from = 'eenmaalandermaal2018@gmail.com'; //send from
            $headers = array();
            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-type: text/html; charset=iso-8859-1";
            $headers[] = "From: EenmaalAndermaal <{$from}>";
            $headers[] = "Reply-To: EenmaalAndermaal <{$from}>";
            $headers[] = "X-Mailer: PHP/" . phpversion();
            mail($to, $subject, $email, implode("\r\n", $headers), "-f" . $from);

            header("Refresh: 3; url=Login.php");
            echo "Je account is gemaakt! <br/> Klik op de activatie link op uw mail om uw account the verifiëren";

        }elseif($isCorrect == false){
            echo "Wachtwoord komt niet overeen";
        }else{
            echo "Niet alle velden zijn ingevuld! Scroll naar onder om te kijken waar.";
        };
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        var xhttp;

        if (window.XMLHttpRequest) {
            // code for modern browsers
            xhttp = new XMLHttpRequest();
        } else {
            // code for old IE browsers
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        function loadDoc(url, $elementID) {
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if($elementID = 'voornaamfout') {
                        document.getElementById('voornaamfout').innerHTML = "";
                    }
                    document.getElementById($elementID).innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", url, true);
            xhttp.send();
        }
    </script>
</head>
<body>
<div id="login-container" class="container w-50 rounded ">
    <h1>Registreren</h1><br>
    <form action="" method="post">
        <div class="form-group">
            <?php echo $fnameerr ?> <br>
            <label for="voornaam">Voornaam:</label>
            <input id="voornaam" class="form-control" type="text" name="firstname"><br>
            <?php echo $lnameerr ?><br>
            <label for="achternaam">Achternaam:</label>
            <input id="achternaam" class="form-control" type="text" name="lastname"><br>
            <?php echo $userr;
            echo $user?><br>
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input id="gebruikersnaam" class="form-control" type="text" name="username"><br>
            <?php echo $adderr ?><br>
            <label for="adres">Adres:</label>
            <input id="adres" class="form-control" type="text" name="address1"><br>
            <?php echo $posterr ?><br>
            <label for="adres-2">Adres-2:</label>
            <input id="adres-2" class="form-control" type="text" name="address2"><br>
            <label for="postcode">Postcode:</label>
            <input id="postcode" class="form-control" type="text" name="postalcode"><br>

            <label>Land:</label>
            <select class="form-control" name="country">
                <?php foreach ($options as $land) { ?>
                    <option><?php echo $land['landcode'] ?></option>
                <?php } ?>
            </select><br>
            <?php echo $dateerr ?><br>
            <label for="geboortedatum">Geboortedatum:</label>
            <input id="geboortedatum" class="form-control" type="text" name="date"><br>
            <?php echo $mailerr;
            echo $mailer?><br>
            <label for="mail">Mail:</label>
            <input id="mail" class="form-control" type="text" name="mail"><br>
            <?php echo $passerr ?><br>
            <label for="wachtwoord">Wachtwoord:</label>
            <input id="wachtwoord" class="form-control" type="password" name="password"><br>
            <?php echo $passherr ?><br>
            <label for="wachtwoord-herhalen">Wachtwoord-herhalen:</label>
            <input id="wachtwoord-herhalen" class="form-control" type="password" name="password_h"><br>
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
<?php include "footer.php"; ?>
</body>
</html>
