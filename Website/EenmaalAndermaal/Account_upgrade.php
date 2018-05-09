<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 25-4-2018
 * Time: 14:44
 */

include 'general_functions.php';

/**
 * Shows the Account Upgrade page to the user.
 *
 * @param String $currency Currency symbol
 * @return void
 */
function showAccountUpgrade($currency) {
    include 'Template.php'; ?>
    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <link rel="stylesheet" type="text/css" href="css/Account.css">
        <title>Account Upgrade</title>
    </head>
    <body>
        <div id="container" class="container rounded">
            <h1>Account Upgrade</h1><br>
            <p>Heeft u interesse om het volle potentieel uit EenmaalAndermaal te halen?
                Wilt u de mogelijkheid krijgen om een voorwerp te kopen/verkopen?
                Upgrade uw account nu dan naar Koper/verkoper met een eenmalige betaling
                voor slechts <?= $currency; ?> 50,- !</p><br>
            <!--        moet naar upgrade.php gaan straks.-->
            <form action="index.php" method="post">
                <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="Upgrade" value="Betalen">
            </form><br>
        </div>
    </body>
    </html>
    <?php include_once 'Footer.php';
}

/**
 * Determines what page to show the user based on the 'rol'. If the user has a 'rol' and it is not "gast" it will show
 * the account upgrade page, if not it will redirect to index.php
 */
function determineWhatToShow() {
    if(isset($_SESSION['rol']) && $_SESSION['rol'] != "gast"){
        showAccountUpgrade("[INSERT CURRENCY HERE]");
        //Moet nog iets toevoegen waarmee de currency bepaald wordt?
    }else{
        redirectToIndex();
    }
}

determineWhatToShow();
?>