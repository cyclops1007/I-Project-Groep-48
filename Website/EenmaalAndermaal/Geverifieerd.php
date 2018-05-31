<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 16-5-2018
 * Time: 09:43
 */
//wanneer de link geverificeerd word kom je hier
include "Template.php";

if($_GET['email']){

    //verify data
    $mailaddress     = $_GET['email'];
    $sql = "SELECT count(*) From Gebruiker WHERE verified IS NULL";
    $search = $dbh->prepare($sql);
    $search->execute();
    $match = $search->fetchColumn();

    echo $match;exit; //verwijder na testen
    if($match > 0){
        // We have a match, activate the account
        $activeer = $dbh->prepare("UPDATE Gebruiker SET verified = '1' WHERE mailbox=$mailaddress");
        $activeer->execute();
        echo "Je account is geactiveerd, je kan nu inloggen!";
        header("Location: Login.php");

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


