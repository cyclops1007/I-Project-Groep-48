<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 9:14
 */

include 'template.php';
$valuta = getValuta();
$landnaam = getLanden();
isUser();
if(isUBlocked($_SESSION['ID'])){ redirect('index');}
if (!empty($_POST)) {


    $required = array('Titel', 'Beschrijving', 'Startprijs', 'Betalingswijze', 'Pic');

    $error = false;
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }
    if ($error) {
        echo "All fields are required.";
    } else {
        $titel          = $_POST['Titel'];
        $beschrijving   = $_POST['Beschrijving'];
        $startprijs     = $_POST['Startprijs'];
        $betalingswijze = $_POST['Betalingswijze'];
        $foto           = $_POST['Pic'];
        echo "Voorwerp is toegevoegd";
        verkoop($_POST);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  </head>
<body>
<div id="login-container" class="container w-50 rounded ">
    <h1>Voorwerp verkopen</h1><br>
    <form action="" method="post">
        <div class="form-group">
            <label>Titel:</label>
            <input class="form-control" type="text" name="Titel"><br>
            <label>Beschrijving:</label>
            <input class="form-control" type="text" name="Beschrijving"><br>
            <label>Startprijs:</label>
            <input class="form-control" type="text" name="Startprijs"><br>
            <label>betalingswijze:</label>
            <input class="form-control" type="text" name="Betalingswijze"><br>
            <label>Valuta:</label>
            <select class="form-control" name="Valuta">
                <?php foreach($valuta as $key){
                    echo"<option>" . $key['valuta'] . "</option>";
                } ?>
            </select><br>
            <label>Land:</label>
            <select class="form-control" name="Land">
                <?php foreach($landnaam as $land){
                    echo"<option>" . $land['landcode'] . "</option>";
                } ?>
            </select><br>
            <label>Upload foto's</label>
            <input type="file" name="Pic" accept="image/*">
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Bevestigen</button>
    </form>
</div>
</body>
</html>
