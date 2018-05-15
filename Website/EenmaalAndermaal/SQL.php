<?php
/**
 * Created by PhpStorm.
 * User: Kay
 * Date: 8-5-2018
 * Time: 10:32
 */
function Gebruiker()
{
    global $dbh;

    $sql = $dbh->query("SELECT * FROM Gebruiker");
    $gebruiker = $sql->fetchALL();

    return $gebruiker;
}
?>