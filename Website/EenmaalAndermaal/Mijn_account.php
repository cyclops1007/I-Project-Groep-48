<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 10:37
 */

include 'Template.php';
$array = ['1', '2', '3'];
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
    if ($_SESSION['change'] == NULL || $_SESSION['change'] == 0) {
        echo "<h2>Gebruikersnaam:</h2>";
        echo "<h2>Naam: </h2>";
        echo "<h2>Adres:</h2>";
        echo "<h2>Adres-2:</h2>";
        echo "<h2>Postcode:</h2>";
        echo "<h2>Plaats:</h2>";
        echo "<h2>Land:</h2>";
        echo "<h2>Geboortedatum:</h2>";
        echo "<h2>E-mail:</h2>";
    } elseif ($_SESSION['change'] == 1) {
        ?>
        <form action="" method="post">
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
                    <?php foreach ($array as $key) { ?>
                        <option><?php echo $option ?></option>
                    <?php } ?>
                </select><br>
                <label>Geboortedatum:</label>
                <input class="form-control" type="text" name="city"><br>
                <label>E-mail:</label>
                <input class="form-control" type="text" name="mail"><br><br>
                <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Change"
                       value="Verander account informatie">
                <br><br>
            </div>
        </form>
    <?php }
    if (($_SESSION['change'] == NULL || $_SESSION['change'] == 0)) {
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
<?php //include 'Footer.php';
?>
</body>
</html>