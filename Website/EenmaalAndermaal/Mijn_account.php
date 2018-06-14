<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 10:37
 */

include 'template.php';
isUser();
$accountInfo = mijnAccount($_SESSION['ID']);
$_SESSION['change'] = NULL;
if (!isset($_SESSION['change']) && !empty($_POST)) {
    $_SESSION['change'] = $_POST["Change"];;
} if ((isset($_POST['voornaam']) )) {
        updateAccount($_POST);
    $_SESSION["change"] = NULL;
    $_POST['voornaam'] = null;
    //redirect('Mijn_account');
    //header("Refresh:0");
    //header("Refresh:5; url=Mijn_account");
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
                echo "<h2>Gebruikersnaam: " ;   if(isset($_POST['gebruikersnaam'])){echo $_POST['gebruikersnaam'];}else{ echo $key['gebruikersnaam'];}  echo "</h2>";
                echo "<h2>Naam: " ;   if(isset($_POST['voornaam'])){echo $_POST['voornaam'];}else{ echo $key['voornaam'];}  echo "</h2>";
                echo "<h2>Achternaam: " ;   if(isset($_POST['achternaam'])){echo $_POST['achternaam'];}else{ echo $key['achternaam'];}  echo "</h2>";
                echo "<h2>Adres: " ;   if(isset($_POST['adresregel1'])){echo $_POST['adresregel1'];}else{ echo $key['adresregel1'];}  echo "</h2>";
                echo "<h2>Adres-2: " ;   if(isset($_POST['adresregel2'])){echo $_POST['adresregel2'];}else{ echo $key['adresregel2'];}  echo "</h2>";
                echo "<h2>Postcode: " ;   if(isset($_POST['postcode'])){echo $_POST['postcode'];}else{ echo $key['postcode'];}  echo "</h2>";
                echo "<h2>Land: " ;   if(isset($_POST['landcode'])){echo $_POST['landcode'];}else{ echo $key['landcode'];}  echo "</h2>";
                echo "<h2>Geboortedatum: " ;   if(isset($_POST['geboortedag'])){echo $_POST['geboortedag'];}else{ echo $key['geboortedag'];}  echo "</h2>";
                echo "<h2>E-mail: " ;   if(isset($_POST['mailbox'])){echo $_POST['mailbox'];}else{ echo $key['mailbox'];}  echo "</h2>";
            }
            ?>
            <br>
            <form action="mijn_account.php" method="post">
                <input type="hidden" id="Change" name="Change" value="1">
                <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Verander"
                       value="Verander account informatie">
            </form>
            <br>
            <?php
            } elseif ($_SESSION['change'] == 1) {
            foreach ($accountInfo as $key){ ?>
                <form action="mijn_account.php" method="post">
                    <div class="form-group">
                        <label>Voornaam:</label>
                        <input class="form-control" type="text" name="voornaam" value="<?php echo $key['voornaam'];?>"><br>
                        <label>Achternaam:</label>
                        <input class="form-control" type="text" name="achternaam" value="<?php echo $key['achternaam'];?>"><br>
                        <label>Gebruikersnaam:</label>
                        <input class="form-control" type="text" name="gebruikersnaam" value="<?php echo $key['gebruikersnaam'];?>"><br>
                        <label>Adres:</label>
                        <input class="form-control" type="text" name="adresregel1" value="<?php echo $key['adresregel1'];?>"><br>
                        <label>Adres-2:</label>
                        <input class="form-control" type="text" name="adresregel2" value="<?php echo $key['adresregel2'];?>"><br>
                        <label>Land:</label>
                        <select class="form-control" name="land">
                            <?php foreach ($array as $option) { ?>
                                <option><?php echo $option; ?></option>
                            <?php } ?>
                        </select><br>
                        <label>Postcode:</label>
                        <input class="form-control" type="text" name="postcode" value="<?php echo $key['postcode'];?>"><br>
                        <label>E-mail:</label>
                        <input class="form-control" type="text" name="mailbox" value="<?php echo $key['mailbox'];?>"><br><br>
                        <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Change"
                               value="Wijzig">
                        <br><br>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>
</html>