<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 24-4-2018
 * Time: 9:14
 */

include 'Template.php';
$valuta = getValuta();
print_r($valuta);
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
        $beschrijving   = $_POST['Beschrijving'];
        $startprijs     = $_POST['Startprijs'];
        $betalingswijze = $_POST['Betalingswijze'];
        $postcode       = $_POST['Postalcode'];
        $foto           = $_POST['Pic'];

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
            <label>Catogorie:</label>
            <input class="form-control" type="text" name="Catogorie"><br>
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
            <label>postcode:</label>
            <input class="form-control" type="text" name="Postalcode"><br>
            <label>Upload foto's</label>
            <input type="file" name="Pic" accept="image/*">
        </div>
        <button type="submit" class="btn btn-outline-light my-2 my-sm-0">Bevestigen</button>
    </form>
</div>
</body>
</html>
