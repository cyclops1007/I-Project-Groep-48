<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 5-6-2018
 * Time: 11:25
 */

include "Template.php";
if (!empty($_POST)) {
    $mailaddress = $_POST['mail'];
    $subject = "Wachtwoord vergeten"; //title
    $email = "Hello it seems you forgot your password <br>
              Please click the link below to get a new password. <br>
               <a href='http://iproject48.icasites.nl/Nieuw_Wachtwoord.php?email=$mailaddress&hash=$hash'>please click this link to activate your account</a>";
    $to = $mailaddress;
    $from = 'eenmaalandermaal2018@gmail.com'; //send from
    $headers = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=iso-8859-1";
    $headers[] = "From: EenmaalAndermaal <{$from}>";
    $headers[] = "Reply-To: EenmaalAndermaal <{$from}>";
    $headers[] = "X-Mailer: PHP/" . phpversion();
    mail($to, $subject, $email, implode("\r\n", $headers), "-f" . $from);
}
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div id="login-container" class="container w-50 rounded" style="padding-bottom: 1%;">
    <h1>Wachtwoord Vergeten</h1>
    <br>
    <p>Weet je het wachtwoord niet meer? Vul hieronder je e-mailadres in. We sturen dan binnen enkele
        minuten een e-mail waarmee een nieuw wachtwoord kan worden aangemaakt.</p>

    <form action="" method="post">
        <div class="form-group">
            <label for="mail">Mail:</label>
            <input id="mail" class="form-control" type="text" name="mail"><br>
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Verzenden</button>
    </form>
    <br>
</div>
<?php include 'Footer.php';?>
</body>
</html>