<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 7-5-2018
 * Time: 10:09
 */

include 'Template.php';
$veiling = veilingen();
isAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/Template.css">
</head>
<body>
    <table class ="table table-dark text-center">
        <thead>
            <tr>
                <th scope="col">Veiling nr.:</th>
                <th scope="col">Veiling naam:</th>
                <th scope="col">Veiling beschrijving:</th>
                <th scope="col">Looptijd:</th>
                <th scope="col">Startprijs:</th>
                <th scope="col">Blokkeren veiling:</th>
            </tr>
        </thead>
        <tbody>
        <!-- For each aanroepen van veilingen -->
        <?php foreach ($veiling as $key) {?>
            <tr>
                <th scope="row"><?php echo $key['voorwerpnummer']; ?></th>
                <td><?php echo $key['titel']; ?></td>
                <td><?php echo $key['beschrijving']; ?></td>
                <td><?php echo $key['looptijd']; ?></td>
                <td><?php echo $key['startprijs']; ?></td>
                <td><button type="button">Blokkeren</button> </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
<?php include 'Footer.php';?>
</body>
</html>