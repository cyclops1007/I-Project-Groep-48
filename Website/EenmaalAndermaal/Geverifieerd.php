<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 16-5-2018
 * Time: 09:43
 */
//wanneer de link geverificeerd word kom je hier
include "template.php";

if($_GET['email']){

    //verify data
    $mailaddress     = $_GET['email'];
    $hash            = $_GET['hash'];
    $sql = "SELECT count(*) From Gebruiker WHERE verified IS NULL AND mailbox='$mailaddress' AND Hash='$hash'";
    $search = $dbh->prepare($sql);
    $search->execute();
    $match = $search->fetchColumn();

    if($match > 0){
        // We have a match, activate the account
        $activeer = $dbh->prepare("UPDATE Gebruiker SET verified = 1 WHERE mailbox='$mailaddress'");
        $activeer->execute();
        header( "refresh:5;url=login.php" );
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


