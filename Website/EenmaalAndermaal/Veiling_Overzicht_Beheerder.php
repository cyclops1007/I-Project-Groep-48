<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 7-5-2018
 * Time: 10:09
 */

include 'Template.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <table class ="table table-dark text-center">
    <thead>
        <th scope="col">Veiling nr.:</th>
        <th scope="col">Veiling naam:</th>
        <th scope="col">Veiling beschrijving:</th>
        <th scope="col">Tijd tot sluiting:</th>
        <th scope="col">Hoogste bod:</th>
    </thead>
    <tbody>
       <!-- For each aanroepen van veilingen -->
        <?php foreach ($veiling as $key) {?>
       <tr>  <th scope="row"><?php echo $veilingNr; ?></th>
           <th scope="row"><?php echo $VeilingNaam; ?></th>
           <th scope="row"><?php echo $VeilingBeschrijving; ?></th>
           <th scope="row"><?php echo $TijdTotSluiting; ?></th>
           <th scope="row"><?php echo $HoogsteBod; ?></th>
       </tr>
        <?php }?>
    </tbody>
</table>
    <form action="/Veiling_Overzicht_Beheerder.php">
            <input type="submit" value="Delete">
    </form>
<?php include 'Footer.php';?>
</body>
</html>