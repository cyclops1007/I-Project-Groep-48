<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 10:37
 */
<<<<<<< HEAD
session_start();
include 'Template.php';
if(isset($_SESSION["change"])){
    $_SESSION["change"] = $_POST["change"];
=======
include 'Template.php';
if(isset($_SESSION["change"])){
    $_SESSION["change"] = $_POST["Change"];
>>>>>>> parent of 2c78713... Account page changes
}else{
    $_SESSION["change"] = NULL;
}
echo "<pre>";
    print_r($_SESSION);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/Account.css">
</head>
    <body>
        <div id="container" class="container rounded">
            <h1>Mijn account</h1><br>
            <?php
            if($_SESSION['change'] == 0) {
<<<<<<< HEAD
                 echo "<h2>Gebruikersnaam:</h2>" . $username;
=======
                echo "<h2>Gebruikersnaam:</h2>" . $username;
>>>>>>> parent of 2c78713... Account page changes
                echo "<h2>Naam: </h2>" . $firstname . $lastname;
                echo "<h2>Adres:</h2>" . $address;
                echo "<h2>Adres-2:</h2>" . $address_2;
                echo "<h2>Postcode:</h2>" . $postalcode;
                echo "<h2>Plaats:</h2>" . $city;
                echo "<h2>Land:</h2>" . $country;
                echo "<h2>Geboortedatum:</h2>" . $date;
                echo "<h2>E-mail:</h2>" . $mail;
            }elseif ($_SESSION['change'] == 1){?>
<<<<<<< HEAD
                <form action="Mijn_account.php" method="POST">
                    <div class="form-group">
                        <label for="firstname">Gebruikersnaam:</label>
                        <input class="form-control" type="text" name="firstname" id="firstname"><br>
                        <label for="lastname">Adres:</label>
                        <input class="form-control" type="text" name="lastname" id="lastname"><br>
                        <label for="username">Adres-2:</label>
                        <input class="form-control" type="text" name="username" id="username"><br>
                        <label for="adress1">Postcode:</label>
                        <input class="form-control" type="text" name="address1" id="adress1"><br>
                        <label for="adress2">Plaats:</label>
                        <input class="form-control" type="text" name="address2" id="adress2"><br>
                        <label for="country">Land:</label>
                        <select class="form-control" name="country" id="country">-->
                            <?php foreach ($array as $key){?>
                                <option><?php echo $option ?><!--</option>-->
                            <?php } ?>
                        </select><br>
                        <label for="city">Geboortedatum:</label>
                        <input class="form-control" type="text" name="city" id="city"><br>
                        <label for="mail">E-mail:</label>
                        <input class="form-control" type="text" name="mail" id="mail"><br><br>
=======
                <form action="welcome.php" method="post">
                    <div class="form-group">
                        <label>Gebruikersnaam:</label>
                        <input class="form-control" type="text" name="firstname"><br>
                        <label>Adres:</label>
                        <input class="form-control" type="text" name="lastname"><br>
                        <label>Adres-2:</label>
                        <input class="form-control" type="text" name="username"><br>
                        <label>Postcode:</label>
                        <input class="form-control" type="text" name="address1"><br>
                        <label>Plaats:</label>
                        <input class="form-control" type="text" name="address2"><br>
                        <label>Land:</label>
                        <select class="form-control" name="country">
                            <?php foreach ($array as $key){?>
                                <option><?php echo $option ?></option>
                            <?php } ?>
                        </select><br>
                        <label>Geboortedatum:</label>
                        <input class="form-control" type="text" name="city"><br>
                        <label>E-mail:</label>
                        <input class="form-control" type="text" name="mail"><br><br>
>>>>>>> parent of 2c78713... Account page changes
                    <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Verander account informatie</button>
                    <br><br>
                    </div>
                </form>
<<<<<<< HEAD
            -<?php }
=======
            <?php }
>>>>>>> parent of 2c78713... Account page changes
            if(($_SESSION['change'] == NULL)){
            ?>
            <br>
            <form action="" method="post">
                <input type="hidden" value="1">
                <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Submit" value="Verander account informatie">
            </form>
            <br>
            <?php } ?>
        </div>
    <?php include 'Footer.php'; ?>
    </body>
</html>