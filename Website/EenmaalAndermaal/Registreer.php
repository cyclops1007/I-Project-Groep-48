<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 9:14
 */

include 'Template.php';
if(isset($_SESSION['rol'])){header("index.php");}
$options = getLanden();
print_r($options);
if (!empty($_POST)){

    $required = array('firstname', 'lastname', 'username', 'address1', 'postalcode', 'date', 'mail', 'password', 'password_h');

    $error = false;
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            print_r($_POST);
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
            $subject = "Signup | verification"; //title
            $email = "Thanks for signing up! <br>
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below. <br>
            
            ------------------------ <br>
            Username: '' $username <br> 
            Password: '' $password <br>
            ------------------------ <br>
         
            <a href='http://localhost/php/website/Website/EenmaalAndermaal/Geverifieerd.php?email=$mailaddress'>please click this link to activate your account</a>";
            $to = $mailaddress;
            $from = 'eenmaalandermaal2018@gmail.com'; //send from
            $headers = array();
            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-type: text/html; charset=iso-8859-1";
            $headers[] = "From: EenmaalAndermaal <{$from}>";
            $headers[] = "Reply-To: EenmaalAndermaal <{$from}>";
            $headers[] = "X-Mailer: PHP/" . phpversion();
            mail($to, $subject, $email, implode("\r\n", $headers), "-f" . $from);


                echo "Je account is gemaakt! <br/> Klik op de activatie link op uw mail om uw account the verifiëren";



        }else{
            echo "Wachtwoord komt niet overeen";
        };
    }
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
            <label for="voornaam">Voornaam:</label>
            <input id="voornaam" class="form-control" type="text" name="firstname"><br>
            <p id="voornaamfout" onkeyup="loadDoc(url, 'voornaamfout')"></p><br>
            <label for="achternaam">Achternaam:</label>
            <input id="achternaam" class="form-control" type="text" name="lastname"><br>
            <p id="achternaamfout"></p><br>
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input id="gebruikersnaam" class="form-control" type="text" name="username"><br>
            <p id="gebruikersnaamfout"></p><br>
            <label for="adres">Adres:</label>
            <input id="adres" class="form-control" type="text" name="address1"><br>
            <p id="adresfout"></p><br>
            <label for="adres-2">Adres-2:</label>
            <input id="adres-2" class="form-control" type="text" name="address2"><br>
            <p id="adres-2fout"></p><br>
            <label for="postcode">Postcode:</label>
            <input id="postcode" class="form-control" type="text" name="postalcode"><br>
            <p id="postcodefout"></p><br>
                    <label>Land:</label>
            <select class="form-control" name="country">
                <?php foreach ($options as $land) { ?>
                    <option><?php echo $land['land'] ?></option>
                <?php } ?>
            </select><br>
            <label for="geboortedatum">Geboortedatum:</label>
            <input id="geboortedatum" class="form-control" type="text" name="date"><br>
            <p id="geboortedatumfout"></p><br>
            <label for="mail">Mail:</label>
            <input id="mail" class="form-control" type="text" name="mail"><br>
            <p id="mailfout"></p><br>
            <label for="wachtwoord">Wachtwoord:</label>
            <input id="wachtwoord" class="form-control" type="password" name="password"><br>
            <p id="wachtwoordfout"></p><br>
            <label for="wachtwoord-herhalen">Wachtwoord-herhalen:</label>
            <input id="wachtwoord-herhalen" class="form-control" type="password" name="password_h"><br>
            <p id="wachtwoord-herhalenfout"></p><br>
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
<?php include "Footer.php"; ?>
</body>
</html>
