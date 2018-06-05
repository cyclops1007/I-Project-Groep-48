<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 5-6-2018
 * Time: 11:34
 */

include "Template.php";

if($_GET['mail']) {

    $mailaddress = $_GET['mail'];

    if (!empty($_POST)) {

        $required = array('password', 'password_h');

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
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $password_h = $_POST['password_h'];
            $isCorrect = password_verify($password_h, $hashed_password);

            if ($isCorrect) {
                $sql = $dbh->prepare("UPDATE gebruiker SET wachtwoord ='$password' WHERE mailbox ='$mailaddress'");
                $sql->execute();
                echo "Je wachtwoord is gewijzigd!";
            } else {
                echo "Wachtwoord komt niet overeen";
            }
        }
    }
} else{
    // invalid approach
    echo "Gebruik de link die naar je is doorgestuurd";
}
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<div id="login-container" class="container w-50 rounded" style="padding-bottom: 1%;">
    <h1>Nieuw wachtwoord</h1>
    <br>
    <p>Vul hieronder je nieuwe wachtwoord in.</p>

    <form action="" method="post">
        <div class="form-group">
            <label for="wachtwoord">Wachtwoord:</label>
            <input id="wachtwoord" class="form-control" type="password" name="password"><br>
            <label for="wachtwoord-herhalen">Wachtwoord-herhalen:</label>
            <input id="wachtwoord-herhalen" class="form-control" type="password" name="password_h"><br>
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Verzenden</button>
    </form>
    <br>
</div>
<?php include 'Footer.php';?>
</body>
</html>

