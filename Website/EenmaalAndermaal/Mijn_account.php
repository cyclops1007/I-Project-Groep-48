<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 10:37
 */

include 'Template.php';
isUser();
$accountInfo = mijnAccount($_SESSION['ID']);
$array = ['1', '2', '3'];//wordt veranderd nadat de database data bevat.
if (!isset($_SESSION["change"])) {
    $_SESSION["change"] = $_POST["Change"];
} else {
    //$_SESSION["change"] = NULL;
}
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
        if ($_SESSION['change'] != 1) {
            foreach ($accountInfo as $key) {
                echo "<h2>Gebruikersnaam: ". $key['gebruikersnaam'] . "</h2>";
                echo "<h2>Naam: "          . $key['voornaam'] . "</h2>";
                echo "<h2>Adres: "         . $key['adresregel1'] . "</h2>";
                echo "<h2>Adres-2: "       . $key['adresregel2'] . "</h2>";
                echo "<h2>Postcode: "      . $key['postcode'] . "</h2>";
                echo "<h2>Plaats: "        . $key['plaatsnaam'] . "</h2>";
                echo "<h2>Land: "          . $key['landcode'] . "</h2>";
                echo "<h2>Geboortedatum: " . $key['geboortedag'] . "</h2>";
                echo "<h2>E-mail: "        . $key['mailbox'] . "</h2>";
            }
        } elseif ($_SESSION['change'] == 1) {
            foreach ($accountInfo as $key){
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label>Voornaam:</label>
                    <input class="form-control" type="text" name="firstname" value="<?php echo $key['voornaam'];?>"><br>
                    <label>Achternaam:</label>
                    <input class="form-control" type="text" name="lastname" value="<?php echo $key['achternaam'];?>"><br>
                    <label>Gebruikersnaam:</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $key['gebruikersnaam'];?>"><br>
                    <label>Adres:</label>
                    <input class="form-control" type="text" name="address1" value="<?php echo $key['adresregel1'];?>"><br>
                    <label>Adres-2:</label>
                    <input class="form-control" type="text" name="address2" value="<?php echo $key['adresregel2'];?>"><br>
                    <label>Land:</label>
                    <select class="form-control" name="country">
                        <?php foreach ($array as $key) { ?>
                            <option><?php echo $option; ?></option>
                        <?php } ?>
                    </select><br>
                    <label>Plaats:</label>
                    <input class="form-control" type="text" name="city" value="<?php echo $key['plaatsnaam'];?>"><br>
                    <label>E-mail:</label>
                    <input class="form-control" type="text" name="mail" value="<?php echo $key['mailbox'];?>"><br><br>
                    <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Change"
                           value="Verander account informatie">
                    <br><br>
                </div>
            </form>
        <?php } }
        if ($_SESSION['change'] !=1) {
            ?>
            <br>
            <form action="Mijn_account.php" method="post">
                <input type="hidden" name="Change" value="1">
                <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Verander"
                       value="Verander account informatie">
            </form>
            <br>
        <?php } ?>
    </div>
</body>
</html>