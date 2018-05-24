<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 22-5-2018
 * Time: 11:51
 */

include 'Template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img {
            float: right;
            border-radius: 5px;
        }
    </style>
</head>
<div id="text-container" class="container rounded col-sm-6">
    <h1>Contact</h1>
    <img width="320" height="200" src="image/ROCTechnovium.jpg" alt="Fancy building" class="float-right">
    <p>Heeft u als klant,verkoper of gast vragen?<br> Dan kunt u met ons contact opnemen via de volgende gegevens:</p>
    <h2>Adresgegevens</h2>
    <p>     Heyendaalseweg 98
        <br>6525 EE Nijmegen
        <br>Telefoon: (024) 890 45 00
        <br>Fax: (024) 890 45 23
        <br>Mail: <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">eenmaalandermaal2018@gmail.com</a>
    </p>
    <h2>Postadres</h2>
    <p>
        Postbus 655
        <br> 6500 AR Nijmegen <br><br>
    </p>
</div>
<?php include 'Footer.php';?>
</html>