<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 16-5-2018
 * Time: 09:43
 */
//wanneer de link geverificeerd word kom je hier
include "Template.php";

if(isset($_GET['mail'])){
    //verify data
    $mailaddress     = $_GET['mail'];
    $search = $dbh->prepare("SELECT mailbox, verified From Gebruiker WHERE mailbox=".$mailaddress." AND verified = '0'");
    $search->execute();
    $match = $search->rowCount();

    echo $match; //verwijder na testen
    if($match > 0){
        // We have a match, activate the account
        $activeer = $dbh->prepare("UPDATE Gebruiker SET verified = '1' WHERE mailbox= ".$mailaddress);
        echo "Je account is geactiveerd, je kan nu inloggen!";

    }else{
        // No match -> invalid url or account has already been activated.
        echo "De URL is invalid of het account is al geactiveerd";
    }
    //verified, mailbox
} else{
    // invalid approach
    echo "Gebruik de link die naar je is doorgestuurd";
}
?>


