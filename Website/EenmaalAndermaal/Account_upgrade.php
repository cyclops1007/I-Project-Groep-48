<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 25-4-2018
 * Time: 14:44
 */

include 'template.php';
isUser();
if(isset($_POST['Upgrade'])){
    upgradeAccount($_SESSION['ID']);
}

function showUpgrade(){
    echo "<p>Heeft u interesse om het volle potentieel uit EenmaalAndermaal te halen?
        Wilt u de mogelijkheid krijgen om een voorwerp te Verkopen?
        Upgrade uw account nu dan naar Verkoper met een eenmalige betaling
            van slechts &euro; 50,- !</p><br>
            <form action=\"\" method=\"post\">
            <input type=\"submit\" class=\"btn btn-outline-light my-2 my-sm-0\" name=\"Upgrade\" value=\"Betalen\">
            </form><br>";
}
function showNoUpgrade(){
    echo "<p>U bent al een verkoper! Er zijn geen upgrades meer mogelijk</p><br>";
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="css/Account.css">
    <title>Account Upgrade</title>
</head>
<body>
    <div id="container" class="container rounded">
        <h1>Account Upgrade</h1><br>
        <?php
            if($_SESSION['rol'] == 1){
                showUpgrade();
            } else {
                showNoUpgrade();
            }
        ?>
        <!--        moet naar upgrade.php gaan straks.-->

    </div>
</body>
</html>
