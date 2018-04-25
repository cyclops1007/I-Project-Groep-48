<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 25-4-2018
 * Time: 14:44
 */
include 'Template.php';
$currency = "[INSERT CURRENCY HERE]";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/Account.css">
</head>
<body>
    <div id="container" class="container rounded">
        <h1>Account upgrade</h1><br>
        <p>Heeft u interesse om het volle potentieel uit EenmaalAndermaal te halen?
            Wilt u de mogelijkheid krijgen om een voorwerp te kopen/verkopen?
            Upgrade uw account nu dan naar Koper/verkoper met een eenmalige betaling
            voor slechts <?php echo $currency; ?> 50,- !</p><br>
<!--        moet naar upgrade.php gaan straks.-->
        <form action="index.php" method="post">
            <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Upgrade" value="Betalen">
        </form><br>
    </div>
    <?php include 'Footer.php'; ?>
</body>
</html>
