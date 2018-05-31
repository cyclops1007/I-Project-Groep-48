<?php
/**
 * Created by PhpStorm.
 * User: joey-
 * Date: 16-5-2018
 * Time: 09:25
 */

include 'Template.php';
$veiling = veilingen();

if(isset($_SESSION['Zoekplaats'])){
    calculateDistance($user, $destination, $amountKm, $id);// hier komt  het id van alle artikelen, de gebruiker postcode de postcode van de random persoon en de hoeveelheid km  dat ie in moet zitten. ja klopt lekker kut.
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="css/Template.css">
</head>
<body>
    <table id="tabeloverzicht" class="table">
        <thead>
            <tr>
                <th scope="col"> Titel</th>
                <th scope="col"> Afbeelding</th>
                <th scope="col">Beschrijving</th>
                <th scope="col">Startprijs</th>
                <th scope="col">Verkoper</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($veiling as $key) {
            ?>
            <tr>
                <th scope="col"><a href="veiling.php?<?php echo $key['voorwerpnummer']?>">   <?php echo $key['titel']; ?></a></th>
                <td><img src="<?php echo 'http://iproject5.icasites.nl/thumbnails/' . $key['thumbnail']; ?>"></td>
                <td><?php echo $key['beschrijving']; ?></td>
                <td><?php echo $key['startprijs'] . ',00'; ?></td>
                <td><?php echo $key['verkoper']; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
<?php include "Footer.php"; ?>
</body>
</html>