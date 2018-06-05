<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 9:14
 */

include 'Template.php';
if (!empty($_POST)) {


    $required = array('Titel', 'Catogorie', 'Beschrijving', 'Startprijs', 'Betalingswijze', 'Postalcode', 'Pic');

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
        $titel          = $_POST['Titel'];
        $catogorie      = $_POST['Catogorie'];
        $beschrijving  = $_POST['Beschrijving'];
        $startprijs     = $_POST['Startprijs'];
        $betalingswijze = $_POST['Betalingswijze'];
        $postcode       = $_POST['Postalcode'];
        $foto           = $_POST['Pic'];
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
            <label for="titel">Titel:</label>
            <input id="titel" class="form-control" type="text" name="Titel"><br>
            <label for="catogorie">Catogorie:</label>
            <input id="catogorie" class="form-control" type="text" name="Catogorie"><br>
            <label for="beschrijving">Beschrijving:</label>
            <input id="beschrijving" class="form-control" type="text" name="Beschrijving"><br>
            <label for="startprijs">Startprijs:</label>
            <input id="startprijs" class="form-control" type="text" name="Startprijs"><br>
            <label for="betalingswijze">betalingswijze:</label>
            <input id="betalingswijze" class="form-control" type="text" name="Betalingswijze"><br>
            <label for="postcode">postcode:</label>
            <input id="postcode" class="form-control" type="text" name="Postalcode"><br>
            <label for="file">Upload foto's</label>
            <input type="file" name="Pic">
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Bevestigen</button>
    </form>
</div>
</body>
</html>
